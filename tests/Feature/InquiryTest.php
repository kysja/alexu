<?php

namespace Tests\Feature;

use App\Models\Inquiry;
use App\Notifications\NewInquiry;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Notifications\AnonymousNotifiable;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class InquiryTest extends TestCase
{
    use RefreshDatabase;

    private function payload(array $overrides = []): array
    {
        return [
            'name' => 'Pat Smith',
            'business' => 'Sparkle Cleaning',
            'email' => 'pat@example.com',
            'phone' => '',
            'team_size' => '2–10',
            'needs' => 'Scheduling lives in a spreadsheet.',
            ...$overrides,
        ];
    }

    public function test_inquiry_is_saved_and_emailed(): void
    {
        Notification::fake();

        $this->from('/small-business')
            ->post('/small-business', $this->payload())
            ->assertRedirect('/small-business')
            ->assertSessionHasNoErrors();

        $this->assertDatabaseHas('inquiries', ['business' => 'Sparkle Cleaning', 'phone' => null]);

        Notification::assertSentTo(
            new AnonymousNotifiable,
            NewInquiry::class,
            fn ($notification, $channels, $notifiable) => $notifiable->routes['mail'] === 'alulogov@gmail.com',
        );
    }

    public function test_inquiry_is_validated(): void
    {
        $this->post('/small-business', $this->payload(['email' => 'nope', 'team_size' => '1000']))
            ->assertSessionHasErrors(['email', 'team_size']);

        $this->assertSame(0, Inquiry::count());
    }

    public function test_bots_filling_the_honeypot_are_ignored(): void
    {
        Notification::fake();

        $this->post('/small-business', $this->payload(['website' => 'http://spam.example']))
            ->assertSessionHasNoErrors();

        $this->assertSame(0, Inquiry::count());
        Notification::assertNothingSent();
    }
}
