<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->tinyInteger('verified')->default(0);
            $table->string('email_token')->nullable();
            $table->integer('phone_number')->nullable();
            $table->integer('switch_account_id')->nullable();

            $table->string('user_role')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
        $this->initializeTable('users');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }

    public function initializeTable($table)
    {
        DB::table($table)->insert([
            [
                'name'=>'olivekoko',
                'password'=>bcrypt('123456'),
                'email'=>'olivekoko723@gmail.com',
                'user_role'=>'Admin',
                'verified'=>'1'
            ]
        ]);
    }
}
