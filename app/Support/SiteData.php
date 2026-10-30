<?php

namespace App\Support;

class SiteData
{
    /**
     * Read a JSON file from resources/data, e.g. "portfolio" or "work/palliq".
     */
    public static function get(string $name): array
    {
        return json_decode(
            file_get_contents(resource_path("data/{$name}.json")),
            true,
            flags: JSON_THROW_ON_ERROR,
        );
    }
}
