<?php

namespace App\Support;

use Illuminate\Support\Collection;

class WorkSections
{
    /**
     * Sections in display order, each with its projects.
     */
    public static function all(): Collection
    {
        $projects = collect(SiteData::get('portfolio'));

        return collect(SiteData::get('work_sections'))
            ->map(fn (array $section) => [
                ...$section,
                'projects' => $projects->where('type', $section['slug'])->values()->all(),
            ]);
    }

    /**
     * Sections with a project count in place of the projects themselves.
     */
    public static function summaries(?Collection $sections = null): array
    {
        return ($sections ?? self::all())
            ->map(fn (array $section) => [
                ...collect($section)->except('projects'),
                'count' => count($section['projects']),
            ])
            ->all();
    }
}
