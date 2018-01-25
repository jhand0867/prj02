<?php

/* 

MacBook-Pro:prj02 joseph$ php artisan make:model Post -mc
Model created successfully.
Created Migration: 2018_01_25_023145_create_posts_table
Controller created successfully.
MacBook-Pro:prj02 joseph$ 

This created all we needed, the Model, Controller and the Migration

once fields are added to the migration, apply it.

MacBook-Pro:prj02 joseph$ php artisan migrate
Migrating: 2018_01_25_023145_create_posts_table
Migrated:  2018_01_25_023145_create_posts_table
MacBook-Pro:prj02 joseph$ 

*/
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('body');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
