<?php

namespace App\Http\Controllers;

use App\Support\SiteData;
use Inertia\Inertia;
use Inertia\Response;

class NoteController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Notes/Index', [
            'notes' => SiteData::get('notes'),
        ]);
    }

    public function show(string $slug): Response
    {
        // Only slugs listed in notes.json are allowed, so the slug is safe to use as a file name.
        $note = collect(SiteData::get('notes'))->firstWhere('slug', $slug);

        abort_if($note === null, 404);

        return Inertia::render('Notes/Show', [
            'note' => $note,
            'details' => SiteData::get("notes/{$slug}"),
        ]);
    }
}
