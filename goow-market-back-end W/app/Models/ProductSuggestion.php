<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSuggestion extends Model
{
    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }
}
