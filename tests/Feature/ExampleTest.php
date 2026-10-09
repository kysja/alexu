<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Inertia\Testing\AssertableInertia as Assert;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    #[DataProvider('sections')]
    public function test_each_section_renders_its_page(string $uri, string $component): void
    {
        $this->withoutVite();

        $this->get($uri)
            ->assertStatus(200)
            ->assertInertia(fn (Assert $page) => $page->component($component));
    }

    public static function sections(): array
    {
        return [
            'home' => ['/', 'Home'],
            'work' => ['/work', 'Work'],
            'notes' => ['/notes', 'Notes'],
            'lab' => ['/lab', 'Lab'],
            'resume' => ['/resume', 'Resume'],
            'contact' => ['/contact', 'Contact'],
        ];
    }
}
