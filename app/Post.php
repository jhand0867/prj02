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

    public function addComment($body)
    {
    	// create coment 

        Comment::create([

            'body' => request('body'),
            
            'post_id' => $this->id

        ]);
    }
}
