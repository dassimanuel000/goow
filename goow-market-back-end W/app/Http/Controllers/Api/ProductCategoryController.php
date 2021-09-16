<?php

namespace App\Http\Controllers\Api;
use App\Http\Requests\ProductCategory\CreateRequest;
use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use \Illuminate\Support\Str;

class ProductCategoryController extends Controller
{
    public function store(CreateRequest $request)
    {
        $productcategory = new ProductCategory([
            'title' => $request->input('title'),
            'merchant_id' => $request->input('merchant_id'),
        ]);

        $productcategory->save();

        return response()->json($productcategory);
    }

    public function destroy($id)
    {
        $productcategory = ProductCategory::find($id);
        $productcategory->delete();

        return $productcategory;
    }

    public function update($id, CreateRequest $request)
    {
        $productcategory = ProductCategory::find($id);
        $productcategory->update($request->all());

        return response()->json('Event Updated');
    }

    public function updateAll()
    {
        foreach (request('product_categories') as $item) {
            ProductCategory::whereId($item['id'])->update(['sort_order' => $item['sort_order']]);
        }
    }
}
