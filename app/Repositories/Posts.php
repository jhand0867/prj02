<?php

// Posts.php
// Posts Repository

namespace App\Repositories;

use App\Post;

class Posts
{

	public function all()
	{

		// return all posts

		return Post::all();

	}

}