<?php

namespace Tests\Unit;

use App\Post;
use Tests\TestCase;
// use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigratons;
use Illuminate\Foundation\Testing\DatabaseTransactions;



class ExampleTest extends TestCase
{
    /**
     * Adding a test to the .
     * archives functionality
     * @return void
     */

    // ensuring the trasaction tray is used
    // to prevent overloading of test database

    use DatabaseTransactions;

    public function testBasicTest()
    {
        
        // Given I have two records in the DB which are posted a month apart
    	// set the records as required

    	// one record with date now
    	$first = factory(Post::class)->create();

    	// one record with a date a month ago
    	$second = factory(Post::class)->create([
    		'created_at' => \Carbon\Carbon::now()->subMonth()
    	]);

        // When I fetch the archives

    	$posts = Post::archives();

        // Then response should be in teh proper format.

        // set the assertion
        // $this->assertCount(2, $posts);


    	// set test to compare data

    	$this->assertEquals([

    		[
    			"year" => $first->created_at->format('Y'), //2017
    			"month" => $first->created_at->format('F'), // name of the month "January"
    			"published" => 1
    		],

    		[
    			"year" => $second->created_at->format('Y'), //2017
    			"month" => $second->created_at->format('F'), // name of the month "January"
    			"published" => 1
    		],

    	], $posts );
    }
}
