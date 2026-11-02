<?php

namespace Tests\Feature;

use App\Support\SiteData;
use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;

class NotesTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutVite();
    }

    public function test_notes_page_lists_all_notes(): void
    {
        $this->get('/notes')
            ->assertStatus(200)
            ->assertInertia(fn (Assert $page) => $page
                ->component('Notes/Index')
                ->has('notes', count(SiteData::get('notes'))));
    }

    public function test_every_note_page_renders(): void
    {
        foreach (SiteData::get('notes') as $note) {
            $this->get("/notes/{$note['slug']}")
                ->assertStatus(200)
                ->assertInertia(fn (Assert $page) => $page
                    ->component('Notes/Show')
                    ->where('note.slug', $note['slug'])
                    ->has('details.blocks'));
        }
    }

    public function test_every_referenced_image_exists(): void
    {
        // Figures without an image render as placeholders, so there may be nothing to check.
        $this->addToAssertionCount(1);

        foreach (SiteData::get('notes') as $note) {
            foreach (SiteData::get("notes/{$note['slug']}")['blocks'] as $block) {
                if (isset($block['image'])) {
                    $this->assertFileExists(public_path("images/notes/{$block['image']}"));
                }
            }
        }
    }

    public function test_unknown_note_returns_404(): void
    {
        $this->get('/notes/nope')->assertStatus(404);
        $this->get('/notes/..%2Fprofile')->assertStatus(404);
    }
}
