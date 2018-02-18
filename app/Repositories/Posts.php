<?php

// Posts.php
// Posts Repository

namespace App\Repositories;

use App\Post;

use App\Redis;

class Posts
{
	protected $redis;



	public function __construct(Redis $redis)
	{

		// laravel supports Redis out of the box

		$this->redis = $redis;


	}

	public function all()
	{

		// return all posts

		return Post::all();

	}

}