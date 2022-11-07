<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Clockwork\Storage\Search;

class PostController extends Controller
{
    public function index()
    {
        // dd(request('search')); //untuk mengambil value dari get


        $title = '';
        if(request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = 'All post in ' . $category->name;
        }

        if(request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = 'All post by ' . $author->name;
        }

        return view('post', [
            "title"     =>  $title,
            "active"    =>  "posts",
            "posts"     =>  Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString(),
            "categories" => Category::all()
            // "posts"     =>  Post::with(['author', 'category'])->latest()->get() bisa pake cara ini atau taro di model
        ]);
    }


    public function show(Post $post)
    {
        return view('singlePost', [
            "title"     =>  "Single Post",
            "active"    =>  "posts",
            "postingan" =>  $post
        ]);
    }
}