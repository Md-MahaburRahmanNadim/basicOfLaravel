<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SinglePostController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //this is use for a complex task
        return 'this is a single action controller';
    }
}
