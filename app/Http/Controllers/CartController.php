<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $is_added = false;
        $productDetail = Product::find($request->input('id'));
        $cart = session('cart');
        if ($cart && count($cart) != 0) {
            foreach ($cart as $index => $product) {
                if ($product->id == $request->input('id')) {
                    $product->price=$productDetail->price;
                    $product->avatar=$productDetail->avatar;
                    $product->enum += $request->input('quantity');
                    $is_added = true;
                    session(['cart' => $cart]);
                }
            }
        }

        if (!$is_added) {
            $product = json_decode('{"id":' . $productDetail->id . ',"name":"' . $productDetail->name . '","avatar":"' . $productDetail->avatar . '","price":' . $productDetail->price . ',"url":"' . $productDetail->url . '","enum":'.$request->input('quantity').'}');
            $request->session()->push('cart', $product);
        }
        return json_encode(session('cart'));
    }

    public function remove(Request $request)
    {
        $cart = session('cart');
        foreach ($cart as $index => $product) {
            if ($product->id == $request->input('id')) {
                unset($cart[$index]);
            }
        }
        session(['cart' => $cart]);
        return json_encode(session('cart'));
    }
}
