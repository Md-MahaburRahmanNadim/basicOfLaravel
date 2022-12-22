<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post;
use Database\Factories\PostsFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // $this->call(PostsSeeder::class); this will seed the PostsSeeder.php file dummy data
        // $this->call(PostsFactory::class);
        // Post::factory(100)->create(
        //     [
        //         'body'=>'overridding the body content of the factory class'
        //     ]
        // );// to create and over right the body column data
        Post::factory(1000)->create();

    }
}
