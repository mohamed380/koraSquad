<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\post;
use app\tag;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = app('App\Http\Controllers\PostsController')->postslist();
        $tags = app('App\Http\Controllers\TagsController')->getTags();
        return view('admin.home', ['posts' => $posts])->with('tags',$tags);
    }
}
