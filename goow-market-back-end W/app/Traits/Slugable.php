<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait Slugable
{
    public static function slug($model, $column)
    {
        $slug = Str::slug($column);
        $check = $model::where('slug', $slug)->first();

        if ($check) {
            do {
                $slug .= rand(1, 9999);
                $check = $model::where('slug', $slug)->first();
            } while ($check);
        }

        return $slug;
    }
}
