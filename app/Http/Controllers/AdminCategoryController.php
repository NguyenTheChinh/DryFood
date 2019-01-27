<?php

namespace App\Http\Controllers;

use App\Category;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.category_index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:category',
        ], [
            'name.max' => 'Tên loại sản phẩm quá dài (>255 kí tự)',
            'name.unique' => 'Tên loại sản phẩm đã tồn tại',
        ])->validate();
        $category = new Category;
        $category->name = $request->input('name');
        $category->url = str_slug($request->input('name'));
        $category->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:category',
        ], [
            'name.max' => 'Tên loại sản phẩm quá dài (>255 kí tự)',
            'name.unique' => 'Tên loại sản phẩm đã tồn tại',
        ])->validate();
        $category->name = $request->input('name');
        $category->url = str_slug($request->input('name'));
        $category->save();
        return response()->json([
            'success'=>1
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if($category->Product->count()==0){
            $category->delete();
        }
        return response()->json([
            'success'=>1
        ]);
    }
}
