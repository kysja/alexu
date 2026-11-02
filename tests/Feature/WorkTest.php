<?php

namespace Tests\Feature;

use App\Support\SiteData;
use Inertia\Testing\AssertableInertia as Assert;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class WorkTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutVite();
    }

    public function test_work_page_lists_all_projects(): void
    {
        $this->get('/work')
            ->assertStatus(200)
            ->assertInertia(fn (Assert $page) => $page
                ->component('Work/Index')
                ->has('sections', count(SiteData::get('work_sections')))
                ->has('sections.0.lead')
                ->has('projects', count(SiteData::get('portfolio')))
                ->where('sections', fn ($sections) => collect($sections)->sum('count') === count(SiteData::get('portfolio'))));
    }

    public function test_old_section_urls_redirect_to_the_filtered_work_page(): void
    {
        // Includes sections that have no projects yet, since all of them used to have a page.
        foreach (SiteData::get('work_sections') as $section) {
            $this->get("/work/{$section['slug']}")
                ->assertRedirect("/work?section={$section['slug']}")
                ->assertStatus(301);
        }
    }

    public function test_case_study_links_back_to_its_section(): void
    {
        $this->get('/work/palliq')
            ->assertInertia(fn (Assert $page) => $page->where('section.slug', 'websites'));
    }

    public function test_section_slugs_do_not_clash_with_case_studies(): void
    {
        $sections = array_column(SiteData::get('work_sections'), 'slug');
        $pages = array_filter(array_column(SiteData::get('portfolio'), 'page'));

        $this->assertSame([], array_intersect($sections, $pages));
    }

    #[DataProvider('detailPages')]
    public function test_project_detail_page_renders(string $slug): void
    {
        $this->get("/work/{$slug}")
            ->assertStatus(200)
            ->assertInertia(fn (Assert $page) => $page
                ->component('Work/Show')
                ->where('project.page', $slug)
                ->has('details.title')
                ->has('details.body'));
    }

    public static function detailPages(): array
    {
        return [['bunnybooks'], ['dbac'], ['palliq'], ['ru']];
    }

    public function test_every_project_with_a_page_has_a_details_file(): void
    {
        foreach (SiteData::get('portfolio') as $project) {
            if (isset($project['page'])) {
                $this->assertFileExists(resource_path("data/work/{$project['page']}.json"));
            }
        }
    }

    public function test_every_project_has_a_known_type(): void
    {
        // A project with any other type would silently drop off the Work pages.
        $types = array_column(SiteData::get('work_sections'), 'slug');

        foreach (SiteData::get('portfolio') as $project) {
            $this->assertContains($project['type'] ?? null, $types, $project['title']);
        }
    }

    public function test_every_referenced_image_exists(): void
    {
        foreach (SiteData::get('portfolio') as $project) {
            $this->assertFileExists(public_path("images/portfolio/{$project['image']}"));

            if (isset($project['full'])) {
                $this->assertFileExists(public_path("images/portfolio/{$project['full']}"));
            }

            if (isset($project['page'])) {
                $details = SiteData::get("work/{$project['page']}");

                foreach ([...$details['shots'] ?? [], ...$details['sites'] ?? []] as $item) {
                    $this->assertFileExists(public_path("images/portfolio/{$item['image']}"));
                }
            }
        }
    }

    public function test_unknown_project_returns_404(): void
    {
        $this->get('/work/nope')->assertStatus(404);
        $this->get('/work/..%2Fprofile')->assertStatus(404);
    }

    public function test_home_and_contact_pages_have_the_profile(): void
    {
        $this->assertFileExists(public_path(ltrim(SiteData::get('profile')['photo'], '/')));

        $this->get('/')
            ->assertInertia(fn (Assert $page) => $page
                ->component('Home')
                ->has('profile.greeting')
                ->has('profile.about')
                ->has('sections', count(SiteData::get('work_sections')))
                ->has('sections.0.count'));

        $this->get('/contact')
            ->assertInertia(fn (Assert $page) => $page
                ->component('Contact')
                ->has('profile.location')
                ->has('profile.contacts.0.href'));
    }

    public function test_small_business_page_has_its_content(): void
    {
        $content = SiteData::get('small_business');
        $images = [$content['hero']['image'], ...collect($content['problems']['items'])->pluck('images')->flatten()];

        foreach ($images as $image) {
            $this->assertFileExists(public_path(ltrim($image, '/')));
        }

        $this->get('/small-business')
            ->assertStatus(200)
            ->assertInertia(fn (Assert $page) => $page
                ->component('SmallBusiness')
                ->has('profile.photo')
                ->has('content.hero.title')
                ->has('content.problems.items')
                ->has('content.steps'));
    }

    public function test_resume_page_has_its_data(): void
    {
        $this->get('/resume')
            ->assertStatus(200)
            ->assertInertia(fn (Assert $page) => $page
                ->component('Resume')
                ->has('profile.about')
                ->has('skills', count(SiteData::get('skills')))
                ->has('experience', count(SiteData::get('experience'))));
    }
}
