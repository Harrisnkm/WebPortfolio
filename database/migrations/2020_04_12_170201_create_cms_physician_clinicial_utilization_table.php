<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCmsPhysicianClinicialUtilizationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_physician_clinicial_utilization', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('NPI', 10)->nullable();
            $table->string('Ind_PAC_ID', 10)->nullable();
            $table->string('lst_nm', 35)->nullable();
            $table->string('frst_nm', 25)->nullable();
            $table->string('spec', 35)->nullable();
            $table->string('prac_st', 2)->nullable();
            $table->string('hcpcs_code', 5)->nullable();
            $table->text('hcpcs_description')->nullable();
            $table->integer('line_srvc_cnt')->nullable();
            $table->integer('bene_cnt')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cms_physician_clinicial_utilization');
    }
}
