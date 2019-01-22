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
        // $count =0;
        // $maxData=3;
        // foreach($selectProduct as $slp){
        //     return view('product',['selectProduct' => $slp]);
        //     $count++;
        //     if($count == $maxData){
        //         break;
        //     }
        // }

        return view('product',['selectProduct' => $selectProduct]);
    }
}
