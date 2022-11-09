<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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
        "active"    =>  "home",
        "posts"     =>  Post::latest()->paginate(10)
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

Route::controller(LoginController::class)->group(function() {
    Route::get('/login', 'index')->name('login')->middleware('guest');
    Route::post('/login', 'authenticate');
    Route::post('/logout', 'logout');
});

Route::controller(RegisterController::class)->group(function() {
    Route::get('/register', 'index')->middleware('guest');
    Route::post('/register', 'store');
});


Route::get('/dashboard', function() {
    return view('template.dashboard.index');
})->middleware('auth');

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');
Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('auth');




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