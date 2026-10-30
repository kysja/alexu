<?php

namespace App\Http\Controllers;

use App\Support\SiteData;
use App\Support\WorkSections;
use Inertia\Inertia;
use Inertia\Response;

class PageController extends Controller
{
    public function home(): Response
    {
        return Inertia::render('Home', [
            'profile' => SiteData::get('profile'),
            'skills' => SiteData::get('skills'),
            'sections' => WorkSections::summaries(),
        ]);
    }

    public function contact(): Response
    {
        return Inertia::render('Contact', [
            'profile' => SiteData::get('profile'),
        ]);
    }

    public function smallBusiness(): Response
    {
        return Inertia::render('SmallBusiness', [
            'profile' => SiteData::get('profile'),
            'content' => SiteData::get('small_business'),
        ]);
    }
}
