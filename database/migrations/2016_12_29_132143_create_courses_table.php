<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 255);
            $table->string('caption', 255);
            $table->string('image', 255);
            $table->text('description');
            $table->decimal('price', 5, 2);
            $table->decimal('price_discount', 5, 2);
            $table->boolean('active')->default(1); //course insert active by default
            $table->timestamps(); //create date and update.
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('courses');
    }
}
