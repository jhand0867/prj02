<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/*
MacBook-Pro:prj02 joseph$ php artisan migrate:reset
Migration not found: 2018_01_23_025021_create_tasks_table
MacBook-Pro:prj02 joseph$ composer dump-autoload
Generating optimized autoload files
> Illuminate\Foundation\ComposerScripts::postAutoloadDump
> @php artisan package:discover
Discovered Package: fideloper/proxy
Discovered Package: laravel/tinker
Package manifest generated successfully.
MacBook-Pro:prj02 joseph$ php artisan make:model Task -m
Model created successfully.
Created Migration: 2018_01_24_022608_create_tasks_table
MacBook-Pro:prj02 joseph$ 


After making all changes and including the desired fields...

MacBook-Pro:prj02 joseph$ php artisan migrate
Migrating: 2018_01_24_022608_create_tasks_table
Migrated:  2018_01_24_022608_create_tasks_table
MacBook-Pro:prj02 joseph$ 

When changing to add default value to completed

MacBook-Pro:prj02 joseph$ php artisan migrate:refresh
Rolling back: 2018_01_24_022608_create_tasks_table
Rolled back:  2018_01_24_022608_create_tasks_table
Rolling back: 2014_10_12_100000_create_password_resets_table
Rolled back:  2014_10_12_100000_create_password_resets_table
Rolling back: 2014_10_12_000000_create_users_table
Rolled back:  2014_10_12_000000_create_users_table
Migration not found: 2018_01_23_025021_create_tasks_table
Migrating: 2014_10_12_000000_create_users_table
Migrated:  2014_10_12_000000_create_users_table
Migrating: 2014_10_12_100000_create_password_resets_table
Migrated:  2014_10_12_100000_create_password_resets_table
Migrating: 2018_01_24_022608_create_tasks_table
Migrated:  2018_01_24_022608_create_tasks_table
MacBook-Pro:prj02 joseph$ 



*/

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->text('body');
            $table->boolean('completed')->default(false);
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
        Schema::dropIfExists('tasks');
    }
}
