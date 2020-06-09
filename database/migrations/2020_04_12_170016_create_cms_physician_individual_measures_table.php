<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCmsPhysicianIndividualMeasuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_physician_individual_measures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('NPI', 10)->nullable();
            $table->string('Ind_PAC_ID', 10)->nullable();
            $table->string('lst_nm', 35)->nullable();
            $table->string('frst_nm', 25)->nullable();
            $table->string('APM_affl_1', 250)->nullable();
            $table->string('APM_affl_2', 250)->nullable();
            $table->string('APM_affl_3', 250)->nullable();
            $table->string('APM_affl_4', 250)->nullable();
            $table->string('measure_CD', 40)->nullable();
            $table->string('measure_title', 250)->nullable();
            $table->string('invs_msr', 1)->nullable();
            $table->string('attestation_value', 1)->nullable();
            $table->integer('prf_rate')->nullable();
            $table->integer('patient_count')->nullable();
            $table->string('collection_type', 4)->nullable();
            $table->string('live_site_IND', 1)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cms_physician_individual_measures');
    }
}
