<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Product::with('productDetails', 'supercategory', 'brand', 'reviews')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $product = Product::create($request->only('product_name', 'product_image', 'product_price', 'supercategory_id', 'category_id', 'subcategory_id', 'brand_id'));

        $product->productDetails()->create([
            'product_color' => $request->input('product_color'),
            'product_material'=> $request->input('product_material'),
            'product_style' => $request->input('product_style'),
            'product_id' => $product->id
        ]);

        return response($product, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return $product->with('productDetails')->first();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->only('product_name', 'product_image', 'product_price'));

        $product->productDetails()->create([
            'product_color' => $request->input('product_color'),
            'product_material'=> $request->input('product_material'),
            'product_style' => $request->input('product_style')
        ]);

        return response($product, Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return response($product, Response::HTTP_NO_CONTENT);
    }
}
