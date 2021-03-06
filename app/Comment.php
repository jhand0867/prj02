<?php

namespace App;

use App\Model;

class Comment extends Model
{
    // declare the relationship

    public function post()
    {
    	return $this->belongsTo(Post::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

}
