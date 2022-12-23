<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// to create a resource controller we need to give this command (php artisan make:controller controllerName --resource)
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    //   quary bilder
    // $posts = DB::statement('SELECT * FROM posts'); it's mean that the DB is queriable
    // $posts = DB::select('SELECT * FROM posts WHERE id =1')
    // $posts = DB::select('SELECT * FROM posts WHERE id = ?',[2])single parameter binding
    // $posts = DB::select('SELECT * FROM posts WHERE id = :id',['id'=>1])multiple parameter binding

    // let's grab all data from db of posts table by using Post elequent model
    // $posts = Post::all() it's return all row in the posts table which is control via Post model. But here we can't do the method chaining. To do the method chaning we need to use (get()) method
    // $posts = Post::get();
    // $posts = Post::orderBy('id','desc')->take(10)->get(); here 1st we order those table row as a desciending order then we take 10 item from 1001 value then we retive those value via get method
    // $posts = Post::where('id',40)->get(); if we dont give any conditional operation the it's take = operation
    // $posts = Post::where('id','<',120)->get();
    $posts = Post::OrderBy('id','desc')->where('id','>',999)->get();

    // $posts = Post::chunk(40,function($posts){
    //     //  here we can do whatever we want 
    //     foreach($posts as $post){
    //         echo $post->title .'<br>';
    //     }
    // });
    // $posts = Post::sum('min_to_read');
    // $posts = Post::avg('min_to_read');
    // $posts = Post::max('min_to_read');
    // $posts = Post::min('min_to_read');
    // $posts = Post::count('min_to_read');
    // dd($posts);
    return view('blog.index',[
        'posts'=>$posts
    ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage. 
     * Store the requested data
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
        // this is old way of inserting data into a database which called oop
        // Post::orderBy('id','desce');
        // $posts = new Post();
        // $posts->title = $request->title;
        // $posts->excerpt = $request->excerpt;
        // $posts->min_to_read = $request->min_to_read;
        // $posts->body = $request->body;
        // $posts->image_path = $request->image_path;
        // $posts->is_published = $request->is_published === 'on';
        // // dd($request->all());

        // $posts->save();
        // let's sotre data in database in a elequent way
        Post::create([
            'title'=>$request->title,
            'excerpt'=>$request->excerpt,
            'body'=>$request->body,
            'image_path'=>$request->image_path,
            'is_published'=>$request->is_published === 'on',
        ]);
        return redirect(route('blog.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = Post::findOrFail($id);
        return view('blog.show',[
            'post'=>$post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return $id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        return $id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        return $id;
    }
}
