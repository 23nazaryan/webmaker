<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.index');
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        return view('pages.show', ['post' => Post::where('slug', $slug)->firstOrFail()]);
    }

    public function tag($slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();

        return view('pages.list', ['posts' => $tag->posts()->paginate(2)]);
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        return view('pages.list', ['posts' => $category->posts()->paginate(2)]);
    }
}
