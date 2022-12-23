<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    // if our Model can't find the posts table anyway then we have to bind it like below
    // protected $table = 'posts';
    // protected $primaryKey = 'title';
    // protected $timestamps = false;
    // protected $dateTime = 'U';
    // protected $connection = 'sqllite';
    // // assigining default value for a column
    // protected $attributes = [
    //     'title'=> 'This is post title'
    // ];

}
