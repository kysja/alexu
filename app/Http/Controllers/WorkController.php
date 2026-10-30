<?php

namespace App\Http\Controllers;

use App\Support\SiteData;
use App\Support\WorkSections;
use Inertia\Inertia;
use Inertia\Response;

class WorkController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Work/Index', [
            'sections' => WorkSections::summaries(),
        ]);
    }

    public function section(string $section): Response
    {
        // The route only matches known section slugs, so this always finds one.
        $sections = WorkSections::all();

        return Inertia::render('Work/Section', [
            'nav' => WorkSections::summaries($sections),
            'section' => $sections->firstWhere('slug', $section),
        ]);
    }

    public function show(string $slug): Response
    {
        // Only slugs listed in portfolio.json are allowed, so the slug is safe to use as a file name.
        $project = collect(SiteData::get('portfolio'))->firstWhere('page', $slug);

        abort_if($project === null, 404);

        return Inertia::render('Work/Show', [
            'project' => $project,
            'details' => SiteData::get("work/{$slug}"),
            'section' => collect(SiteData::get('work_sections'))->firstWhere('slug', $project['type']),
        ]);
    }
}
