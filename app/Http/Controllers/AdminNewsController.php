<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Validator;

class AdminNewsController extends Controller
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
        $news = News::all();
        return view('admin.news.news_index', ['news' => $news]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.news_create');
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
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string',
            'content' => 'required|string',
            'image' => 'required|image',
        ], [
            'title.required' => 'Tiêu đề không thể bỏ trống',
            'title.max' => 'Tiêu đề quá dài (>255 kí tự)',
            'image.image' => 'Ảnh đại diện không hợp lệ'
        ])->validate();

        if ($request->hasFile('image')) {
            $avatar = Storage::disk('uploads')->put('news', $request->file('image'));
            $news = new News;
            $news->title = $request->input('title');
            $news->subtitle = $request->input('subtitle');
            $news->url = str_slug($request->input('title') . '-' . mt_rand(100000, 999999));
            $news->image = '/uploadMedia/' . $avatar;
            $news->content = $request->input('content');
            $news->save();
            return view('admin.news.news_create_success', ['url' => $news->url]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\News $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('admin.news.news_edit', ['news' => $news]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\News $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string',
            'content' => 'required|string',
            'image' => 'image',
        ], [
            'title.required' => 'Tiêu đề không thể bỏ trống',
            'title.max' => 'Tiêu đề quá dài (>255 kí tự)',
            'image.image' => 'Ảnh đại diện không hợp lệ'
        ])->validate();

        if ($request->hasFile('image')) {
            $avatar = Storage::disk('uploads')->put('news', $request->file('image'));
            $news->image = '/uploadMedia/' . $avatar;
        }
        $news->title = $request->input('title');
        $news->subtitle = $request->input('subtitle');
        $news->url = str_slug($request->input('title') . '-' . mt_rand(100000, 999999));
        $news->content = $request->input('content');
        $news->save();
        return view('admin.news.news_edit_success', ['url' => $news->url]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();
        return response()->json([
            'success'=>1
        ]);
    }
}
