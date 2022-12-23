<?php

namespace App\Http\Controllers;

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

    $posts = DB::table('posts')
                ->where('id','<',123)
                ->get()
    ;

    // passing data to view via with method
    // return view('blog.index')->with('posts',$posts);
    // passing data to view via compact method
    // return view('blog.index',compact('posts'));
    return view('blog.index',[
        'posts' => $posts
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
        return 'from is not created';
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
        return 'form is not submitted yet';
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
        return $id;
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
