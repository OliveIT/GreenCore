<?php

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
            $table->string('teacher_type')->nullable();
            $table->string('looking_for')->nullable();
            $table->integer('expected_amount')->nullable();
            $table->integer('days')->nullable();
            $table->integer('location_id')->nullable();
            $table->integer('class_name')->nullable();
            $table->integer('experience')->nullable();
            $table->longText('subject')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
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
