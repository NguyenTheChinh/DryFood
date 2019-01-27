<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        //xu ly
        return view("paymentValidate");
    }

    public function successOrder(){
        return view("orderSuccess");
    }
}
