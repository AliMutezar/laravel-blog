<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home', [
        "title"     =>  "Home",
        "active"    =>  "home"
    ]);
});


Route::get('/about', function () {
    return view('about', [
        "title"     =>  "About",
        "active"    =>  "about",
        "name"      =>  "Ahmad Ali",
        "email"     =>  "aamutezar@gmail.com"
    ]);
});


Route::controller(PostController::class)->group(function() {
    Route::get('/posts', 'index');
    Route::get('/posts/{post:slug}', 'show');
});

Route::get('/categories', function() {
    return view('categories', [
        'title'      => 'Post Categories',
        'active'     => 'categories',
        'categories' => Category::all()
    ]); 
});




// 2 route ini sudah tidak digunakan lagi, karena query-nya sudah di handle di model post
// Route::get('/categories/{category:slug}', function(Category $category) {
//     return view('post', [
//         'title'     => "Post By Category : $category->name",
//         'active'    => 'categories',

//         // Lazy eager loading
//         'posts'     => $category->posts->load('category', 'author') 
//     ]); 
// });

// Route::get('/authors/{author:username}', function(User $author) {
//     return view('post', [
//         'title'     =>  "Post By Author : $author->name",
//         'active'    =>  'authors',

//         // Lazy eager loading
//         'posts'     =>  $author->posts->load('category', 'author') 
//     ]);
// });