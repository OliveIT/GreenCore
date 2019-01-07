<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSwitchAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('switchaccount', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable(false);
            $table->string('street')->nullable(false);
            $table->string('city')->nullable(false);
            $table->string('state')->nullable(false);
            $table->integer('zipcode')->nullable(false);
            $table->integer('utility_id')->nullable(false);
            $table->integer('utility_user')->nullable(false);
            $table->integer('utility_password')->nullable(false);
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
        Schema::dropIfExists('switchaccount');
    }
}
