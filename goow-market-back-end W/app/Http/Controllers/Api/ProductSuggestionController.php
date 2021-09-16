<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProductSuggestion;
use Illuminate\Http\Request;

class ProductSuggestionController extends Controller
{
    public function index()
    {
        $productSuggestions = ProductSuggestion::where('activity_id', request('activity'))
            ->get();
        return [
            'productSuggestions' => $productSuggestions,
        ];
    }

    public function search()
    {
        $productSuggestions = ProductSuggestion::where('title', 'LIKE', "%".request('search_string')."%")
            ->where('activity_id', request('activity'))
            ->get();

        return [
            'productSuggestions' => $productSuggestions,
        ];
    }
}
