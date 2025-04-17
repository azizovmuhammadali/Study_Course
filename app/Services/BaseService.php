<?php

namespace App\Services;

use Illuminate\Support\Str;
use App\Trait\ResponseTrait;
use App\Trait\TranslationTrait;

class BaseService
{
    use ResponseTrait;
    use TranslationTrait;
    protected function generateUniqueSlug(string $name, string $modelClass, string $column = 'slug'): string
    {
        $slug = Str::slug($name);
        $counter = 1;

        while ($modelClass::where($column, $slug)->exists()) {
            $slug = Str::slug($name) . '-' . $counter;
            $counter++;
        }

        return $slug;
    }
}
