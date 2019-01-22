<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ProducController extends Controller
{
    //

    public function index()
    {
        $selectProduct = DB::select('select * from products');

        return view('product',['selectProduct' => $selectProduct]);
    }
}
