<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMealTimeFieldsToPatientMetadatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patient_metadatas', function (Blueprint $table) {
            $table->time("breakfast_at")->default('09:00:00');
            $table->time("lunch_at")->default('14:00:00');
            $table->time("dinner_at")->default('21:00:00');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patient_metadatas', function (Blueprint $table) {
            $table->dropColumn(['breakfast_at', 'lunch_at', 'dinner_at']);
        });
    }
}
