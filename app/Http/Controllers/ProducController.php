<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use DB;

class ProducController extends Controller
{
    //

    public function index()
    {
        $selectProduct = DB::select('select * from products');
        return view('product', ['selectProduct' => $selectProduct]);
    }

    public function show($url)
    {
        $productUrl=Product::where('url', $url);
        if($productUrl->count()==1){
            $product = $productUrl->get()->first();
            // tra ve trang chi tiet sp
            echo 'Tên sản phẩm '.$product->name;
        } else {
            // tra ve trang thong bao sp ko ton tai
            echo 'San pham khong ton tai';
        }
    }
}
