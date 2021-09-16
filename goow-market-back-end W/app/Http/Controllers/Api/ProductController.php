<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use App\Http\Requests\Product\CreateRequest;
use App\Http\Requests\Product\UpdateImageRequest;

class ProductController
{
    public function store(CreateRequest $request)
    {
        return [
            'product' => Product::create($request->validated())
        ];
    }

    public function storeImage(UpdateImageRequest $request)
    {
      $path = $request->image->store('/public/images/products');
      return str_replace('public/','', $path);
    }

    public function destroy($id)
    {
      $product = Product::find($id);
      $product->delete();
  
      return response()->json('Product deleted!');
    }
  
    public function update($id, CreateRequest $request)
    {
      $product = Product::find($id);
      $product->update($request->all());
  
      return $product;
    }
}
