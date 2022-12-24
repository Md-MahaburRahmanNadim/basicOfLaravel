<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostFormRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Unique;

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
    $posts = Post::OrderBy('id','desc')->where('id','>',900)->get();

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
    // public function store(Request $request)
    public function store(PostFormRequest $request)
    {
        $request->validated();
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
        /**
         valadate data via using $request obj validate() method
         */
        

        // let's sotre data in database in a elequent way
        Post::create([
            'title'=>$request->title,
            'excerpt'=>$request->excerpt,
            'body'=>$request->body,
            'image_path'=>$this->sotreImage($request),
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
        // grap the specific post
        $post = Post::where('id',$id)->first();

        return view('blog.edit',['post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    public function update(PostFormRequest $request, $id)
    {
        $request->validated();
        //
        // dd('test'); cheaking that data is comeing or not
       /**
        by this method we cant find the image path we also show the method and token to the user that's we use the except method below the getredoff the _token and _method
        */ 
        // Post::where('id',$id)->update([
        //     'title'=> $request->title,
        //     'excerpt'=> $request->excerpt,
        //     'body'=> $request->body,
        //     'image_path'=> $request->image_path,
        //     'is_published'=> $request->is_published === 'on',
        //     'min_to_read'=> $request->min_to_read,
        // ]);
        
        Post::where('id',$id)->update($request->except(['_token','_method']));
        return redirect(route('blog.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        //dd('test'); to check the flow of our app is working or not
        Post::destroy($id);

       return redirect(route('blog.index'))->with('message','Post has been deleted.');
        // the with method store a key value payer right inside the session of your laravel app which you can access throught the key of it's session
        
    }
    // image path generation and sotre the image in the public directory in image folder
    private function sotreImage($request){
        $newImageName = uniqid().'-'.$request->title. '.' . $request->image->extension();
        /**
         here uniqid() method create a uniqid for each image so that those are not overwrited with the upcoming same name image

         $request->image->extension()
         the from has image name property in the file selecter input html. The extension() extrack the extension of the file and add to the file name as a extension of that image
         */
        return $request->image->move(public_path('images'),$newImageName);
        /**
         here move method except 2 parameter 
         1. file path where it's going to store. Here (public_path()) fn take us to the public folder then it's search for the images derectory if it find then here it's store the value other wise it's create a images folder and then move the image file and sotre here
         2. the file name
         */
    }
}
