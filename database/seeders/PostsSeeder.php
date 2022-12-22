<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // if we want to work with database we need model to talk to the database via data
    /**
     let's create model 
     php artisan make:model singulerModelName
     */
    public function run()
    {
        // let's create dummy data via array
        $posts = [
           [
            'title'=>'Post One',
            'excerpt'=>'Summary of Post One',
            'body'=>'Body of the post One',
            'is_published'=>false,
            'min_to_read'=>2,
            'image_path'=>'sdfd'
           ],
           [
            'title'=>'Post two',
            'excerpt'=>'Summary of Post two',
            'body'=>'Body of the post two',
            'is_published'=>false,
            'min_to_read'=>2,
            'image_path'=>'sdfd'

           ]
        ];
        foreach($posts as $key => $value ){
            // now we are going to insert data into the create_post_table via Post model
            Post::create($value);
            // the dummy data is create but we need to tell the seeder file to seed this class to do that(we have to go the DatabaseSeeder.php file)
        }
    }
}
