<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

  
    public function up()
    {
        Schema::create('flight_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('flight_id');
            $table->primary(['user_id','flight_id']);
            $table->integer('airline_id');
            $table->string('status');
            $table->integer('flight_price');
                    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flight_user');
    }
}
