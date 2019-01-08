<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeonameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('geonames', function (Blueprint $table) {
            $table->string('zip')->nullable(false);
            $table->string('city')->nullable();
            $table->string('state_name')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('state_country')->nullable();
            $table->string('lat')->nullable();
            $table->string('long')->nullable();
            $table->string('accuracy')->nullable();
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
        Schema::dropIfExists('geoname');
    }
}
