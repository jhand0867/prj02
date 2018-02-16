<?php

namespace App;

use App\Model;

use Carbon\Carbon;


class Post extends Model
{
    // Declaring the relationship

    public function comments()
    {
    	return $this->hasMany(Comment::class);
    }

    public function user()
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

    public function scopeFilter($query, $filters)
    {

        // filtering the request
        // using the query string
        // to add a where clause to the SQL

        if (! empty($filters))
        {

            if($month = $filters['month'])
            {
            
                $query = Post::whereMonth('created_at', Carbon::parse($month)->month);

            }

            if($year = $filters['year'])
            {

                $query = Post::whereYear('created_at', $year);

            }

        }    
        

        //$posts = $posts->get();


    }
}
