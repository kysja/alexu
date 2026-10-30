<?php

namespace App\Http\Controllers;

use App\Support\SiteData;
use Inertia\Inertia;
use Inertia\Response;

class ResumeController extends Controller
{
    public function __invoke(): Response
    {
        return Inertia::render('Resume', [
            'profile' => SiteData::get('profile'),
            'skills' => SiteData::get('skills'),
            'experience' => SiteData::get('experience'),
        ]);
    }
}
