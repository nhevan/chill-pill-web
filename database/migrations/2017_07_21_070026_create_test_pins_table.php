<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestPinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_pins', function (Blueprint $table) {
            $table->increments('id');

            $table->boolean('pin1');
            $table->boolean('pin2');
            $table->boolean('pin3');
            $table->boolean('pin4');
            $table->boolean('pin5');
            $table->boolean('pin6');
            $table->boolean('pin7');
            $table->boolean('pin8');
            $table->boolean('pin9');

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
        Schema::dropIfExists('test_pins');
    }
}
