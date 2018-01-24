<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // adding a wrapper query

    public static function incomplete()
    {
    	return static::where('completed',0)->get();
    }
}
