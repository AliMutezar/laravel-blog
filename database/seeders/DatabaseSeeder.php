<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        


        // Membuat data dummy dengan seeder
        // User::create([
        //     'name'      =>  'Ali',
        //     'email'     =>  'aamutezar@gmail.com',
        //     'password'  => bcrypt('12345')
        // ]);

        // User::create([
        //     'name'      =>  'Rakaboyong',
        //     'email'     =>  'raka@gmail.com',
        //     'password'  => bcrypt('54321')
        // ]);

        // Membuat data dummy dengan factory
        User::factory(5)->create();

        Category::create([
            'name'  =>  'Web Programming',
            'slug'  =>  'web-programming'      
        ]);

        Category::create([
            'name'  =>  'Personal',
            'slug'  =>  'personal'      
        ]);

        Category::create([
            'name'  =>  'Web Design',
            'slug'  =>  'web-design'      
        ]);


        Post::factory(20)->create();



        // Post::create([
        //     'title'         =>  'Judul Pertama',
        //     'slug'          =>  'judul-pertama',
        //     'excerpt'       =>  "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repellat, nostrum?",
        //     'body'          =>  "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Amet facilis sed dicta quas corrupti quaerat porro illum eaque, dignissimos optio cum temporibus possimus deserunt saepe deleniti molestias ratione beatae omnis veritatis accusantium, est unde reiciendis facere! Rem sint quam hic veritatis adipisci voluptatem aspernatur itaque totam doloribus molestiae quae iusto praesentium nostrum iure debitis quas tempora, commodi saepe libero quis nisi cum pariatur earum blanditiis! Quis voluptate praesentium officia quod? Voluptates temporibus quidem sequi sint omnis fuga odio totam, molestiae ipsam distinctio et recusandae, quae voluptas quibusdam dolore asperiores iusto quasi quo culpa corrupti facilis placeat dolor perferendis consequuntur! Et!",
        //     'category_id'   =>  1,
        //     'user_id'       =>  1
        // ]);


        // Post::create([
        //     'title'         =>  'Judul Kedua',
        //     'slug'          =>  'judul-kedua',
        //     'excerpt'       =>  "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repellat, nostrum?",
        //     'body'          =>  "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Amet facilis sed dicta quas corrupti quaerat porro illum eaque, dignissimos optio cum temporibus possimus deserunt saepe deleniti molestias ratione beatae omnis veritatis accusantium, est unde reiciendis facere! Rem sint quam hic veritatis adipisci voluptatem aspernatur itaque totam doloribus molestiae quae iusto praesentium nostrum iure debitis quas tempora, commodi saepe libero quis nisi cum pariatur earum blanditiis! Quis voluptate praesentium officia quod? Voluptates temporibus quidem sequi sint omnis fuga odio totam, molestiae ipsam distinctio et recusandae, quae voluptas quibusdam dolore asperiores iusto quasi quo culpa corrupti facilis placeat dolor perferendis consequuntur! Et!",
        //     'category_id'   =>  1,
        //     'user_id'       =>  1
        // ]);

        // Post::create([
        //     'title'         =>  'Judul Ketiga',
        //     'slug'          =>  'judul-ketiga',
        //     'excerpt'       =>  "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repellat, nostrum?",
        //     'body'          =>  "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Amet facilis sed dicta quas corrupti quaerat porro illum eaque, dignissimos optio cum temporibus possimus deserunt saepe deleniti molestias ratione beatae omnis veritatis accusantium, est unde reiciendis facere! Rem sint quam hic veritatis adipisci voluptatem aspernatur itaque totam doloribus molestiae quae iusto praesentium nostrum iure debitis quas tempora, commodi saepe libero quis nisi cum pariatur earum blanditiis! Quis voluptate praesentium officia quod? Voluptates temporibus quidem sequi sint omnis fuga odio totam, molestiae ipsam distinctio et recusandae, quae voluptas quibusdam dolore asperiores iusto quasi quo culpa corrupti facilis placeat dolor perferendis consequuntur! Et!",
        //     'category_id'   =>  2,
        //     'user_id'       =>  1
        // ]);

        // Post::create([
        //     'title'         =>  'Judul Keempat',
        //     'slug'          =>  'judul-keempat',
        //     'excerpt'       =>  "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repellat, nostrum?",
        //     'body'          =>  "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Amet facilis sed dicta quas corrupti quaerat porro illum eaque, dignissimos optio cum temporibus possimus deserunt saepe deleniti molestias ratione beatae omnis veritatis accusantium, est unde reiciendis facere! Rem sint quam hic veritatis adipisci voluptatem aspernatur itaque totam doloribus molestiae quae iusto praesentium nostrum iure debitis quas tempora, commodi saepe libero quis nisi cum pariatur earum blanditiis! Quis voluptate praesentium officia quod? Voluptates temporibus quidem sequi sint omnis fuga odio totam, molestiae ipsam distinctio et recusandae, quae voluptas quibusdam dolore asperiores iusto quasi quo culpa corrupti facilis placeat dolor perferendis consequuntur! Et!",
        //     'category_id'   =>  2,
        //     'user_id'       =>  2
        // ]);
    }
}
