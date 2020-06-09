<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCmsPhysicianGroupMeasuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_physician_group_measures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('Org_nm', 70)->nullable();
            $table->string('Org_PAC_ID', 10)->nullable();
            $table->string('ST', 2)->nullable();
            $table->string('ACO_ID_1', 6)->nullable();
            $table->string('ACO_nm_1', 70)->nullable();
            $table->string('ACO_ID_2', 6)->nullable();
            $table->string('ACO_nm_2', 70)->nullable();
            $table->string('measure_CD', 40)->nullable();
            $table->string('measure_title', 250)->nullable();
            $table->string('invs_msr', 1)->nullable();
            $table->string('attestation_value', 1)->nullable();
            $table->integer('prf_rate')->nullable();
            $table->integer('patient_count')->nullable();
            $table->integer('star_value')->nullable();
            $table->integer('five_star_benchmark')->nullable();
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
        Schema::dropIfExists('cms_physician_group_measures');
    }
}
