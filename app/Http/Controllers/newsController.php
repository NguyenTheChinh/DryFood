<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class newsController extends Controller
{
    //
    public function index(){
        $news = DB::select('select * from news');
        return view("news",["news"=>$news]);
    }
}
