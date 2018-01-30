<?php

namespace App;

use App\Model;

class Post extends Model
{
    // Declaring the relationship

    public function comments()
    {
    	return $this->hasMany(Comment::class);
    }
}
