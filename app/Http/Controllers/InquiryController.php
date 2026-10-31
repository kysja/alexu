<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use App\Notifications\NewInquiry;
use App\Support\SiteData;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Validation\Rule;

class InquiryController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        // Hidden field that people never see; bots that fill it get a fake success.
        if ($request->filled('website')) {
            return back();
        }

        $inquiry = Inquiry::create($request->validate([
            'name' => ['required', 'string', 'max:100'],
            'business' => ['required', 'string', 'max:150'],
            'email' => ['required', 'email', 'max:150'],
            'phone' => ['nullable', 'string', 'max:30'],
            'team_size' => ['required', Rule::in(SiteData::get('small_business')['form']['team_sizes'])],
            'needs' => ['required', 'string', 'max:3000'],
        ]));

        $email = collect(SiteData::get('profile')['contacts'])->first(fn ($contact) => str_starts_with($contact['href'], 'mailto:'));

        Notification::route('mail', $email['label'])->notify(new NewInquiry($inquiry));

        return back();
    }
}
