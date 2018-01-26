<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // prevent mass assignment
    protected $fillable = [ 'title' , 'body' ];
}
