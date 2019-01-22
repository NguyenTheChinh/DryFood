<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
//        dd($products[0]);
//        dd($products[0]->category->name);
        return view('admin.product.product_index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.product_create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|numeric|min:1',
            'code' => 'required|string|max:255',
            'old_price' => 'required|numeric|min:0',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'avatar' => 'required|image',
        ]);
        if ($request->hasFile('avatar')) {
            $avatar = Storage::disk('uploads')->put('avatar', $request->file('avatar'));
            $images = '';
            if ($request->hasFile('image')) {
                foreach ($request->image as $key => $image) {
                    if($key==0){
                        $images .= '/uploadMedia/products/' . Storage::disk('uploads')->put('description', $image);
                    }
                     else $images .= ' | /uploadMedia/products/' . Storage::disk('uploads')->put('description', $image);
                }
            }
            dd($request->all());
//            dd(str_slug('â - bádl1s'));
            $product = new Product;
            $product->name = $request->input('name');
            $product->url = str_slug($request->input('url').'-'.$request->input('code'));
            $product->description = $request->input('description');
            $product->code = $request->input('code');
            $product->old_price = $request->input('old_price');
            $product->price = $request->input('price');
            $product->avatar = '/uploadMedia/products/' . $avatar;
            $product->image = $images;
            $product->category_id = $request->input('category_id');
            $product->save();
            return view('admin.product.product_create_success');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
