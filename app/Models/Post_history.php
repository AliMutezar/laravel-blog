<?php

namespace App\Models;

class Post 
{
    private static $blog_posts = [
        [
            "title"     =>  "Belajar Laravel Unpas",
            "slug"      =>  "belajar-laravel-unpas",
            "lecturer"  =>  "Shandhika Galih",
            "body"      =>  " Lorem ipsum dolor, sit amet consectetur adipisicing elit. Beatae eius unde, blanditiis possimus voluptate atque quae quis dignissimos reprehenderit nemo ducimus doloribus ex. Culpa nam tenetur provident perferendis sunt, corporis minus molestias excepturi ut accusamus cumque rerum, eos laboriosam repudiandae at atque maxime quos debitis fugit similique dolore, hic pariatur corrupti. Ad quod alias at commodi assumenda, iure in ullam sed maxime consequuntur, blanditiis, non repellendus. Explicabo, assumenda. Consectetur, aspernatur! Deserunt incidunt molestias nostrum aperiam similique officia aliquam quod repellendus."
        ],

        [
            "title"     =>  "Belajar CRUDS Laravel",
            "slug"      =>  "belajar-cruds-laravel",
            "lecturer"  =>  "Eko Kurniawan Khannedy",
            "body"      =>  " Lorem ipsum dolor, sit amet consectetur adipisicing elit. Beatae eius unde, blanditiis possimus voluptate atque quae quis dignissimos reprehenderit nemo ducimus doloribus ex. Culpa nam tenetur provident perferendis sunt, corporis minus molestias excepturi ut accusamus cumque rerum, eos laboriosam repudiandae at atque maxime quos debitis fugit similique dolore, hic pariatur corrupti. Ad quod alias at commodi assumenda, iure in ullam sed maxime consequuntur, blanditiis, non repellendus. Explicabo, assumenda. Consectetur, aspernatur! Deserunt incidunt molestias nostrum aperiam similique officia aliquam quod repellendus."
        ]
    ];


    public static function all()
    {
        return collect(self::$blog_posts);
    }


    public static function find($slug)
    {
        $posts = static::all();
        return $posts->firstWhere('slug', $slug);
    }
}
