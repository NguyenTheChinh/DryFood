<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class newsController extends Controller
{
    //
    public function index(){
        return view("news");
    }
}
