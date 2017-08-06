<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCellFieldsToPatientMetadatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patient_metadatas', function (Blueprint $table) {
            $table->string("cell1")->nullable();
            $table->string("cell2")->nullable();
            $table->string("cell3")->nullable();

            $table->string("cell4")->nullable();
            $table->string("cell5")->nullable();
            $table->string("cell6")->nullable();

            $table->string("cell7")->nullable();
            $table->string("cell8")->nullable();
            $table->string("cell9")->nullable();
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
            $table->dropColumn(['cell1', 'cell2', 'cell3', 'cell4', 'cell5', 'cell6', 'cell7', 'cell8', 'cell9']);
        });
    }
}
