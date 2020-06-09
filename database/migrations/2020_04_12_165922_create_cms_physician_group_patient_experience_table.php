<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCmsPhysicianGroupPatientExperienceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_physician_group_patient_experience', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('Org_nm', 70)->nullable();
            $table->string('Org_PAC_ID', 10)->nullable();
            $table->string('ST', 2)->nullable();
            $table->string('measure_CD', 40)->nullable();
            $table->string('measure_title', 250)->nullable();
            $table->integer('prf_rate')->nullable();
            $table->integer('patient_count')->nullable();
            $table->string('FN',1)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cms_physician_group_patient_experience');
    }
}
