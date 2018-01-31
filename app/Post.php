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

    public function post()
    {
    	return $this->belongsTo(User::class);
    }

    public function addComment($body)
    {
    	// create coment 

        //Comment::create([

        //    'body' => request('body'),

        //    'post_id' => $this->id

        //]);

        // the short way
        // using the relationship

        $this->comments()->create(['body' => $body]);

        // either option will work

        //$this->comments()->create(compact('body'));
        

    }
}
