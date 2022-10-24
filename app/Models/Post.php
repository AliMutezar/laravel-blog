<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Semua yg di dalam boleh diisi, diluar itu tidak boleh
    // protected $fillable = ['title', 'excerpt', 'body'];

    // Semua yg di dalam tidak boleh diisi, diluar itu boleh diisi
    protected $guarded  = ['id'];

    // N+1 Problem
    protected $with     = ['author', 'category'];


    // Search query dengan fitur scope dari eloquent
    public function scopeFilter($query, array $filters)
    {

        // Menggunakan function callback
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%')
                        ->orWhere('body', 'like', '%' . $search . '%' );
        });


        // whereHas untuk join table dan dijalankan ketika di request ada category-nya
        $query->when($filters['category'] ?? false, function($query, $category) {
            return $query->whereHas('category', function($query) use ($category) {
                $query->where('slug', $category);
            });
        });

        // Menggunakan arrow function
        $query->when($filters['author'] ?? false, fn($query, $author) => 
            $query->whereHas('author', fn($query) => 
                $query->where('username', $author)
            )
        );
    }


    // Membuat relasi One to One ke model Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    // untuk membuat relasi, sudut pandanya sesuai dengan model
    // seperti contoh, karena kita ada di model Post, maka main table nya adalah post yang berelasi ke table user
    // jadi hubungannya 1 post dibuat oleh 1 user saja, jadi relasinya belongsTo

    // kita bisa buat alias functionnya, tetapi harus dikasih 1 field parameter foreign key-nya
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

       // Overriding route binding model untuk mengembalikan nilai selain dari column id, contohnya kita pake column slug untuk melihat detail dari setiap post
       public function getRouteKeyName()
       {
           return 'slug';
       }
}
