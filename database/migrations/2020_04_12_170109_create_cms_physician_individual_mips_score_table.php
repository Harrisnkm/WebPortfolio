<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCmsPhysicianIndividualMipsScoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_physician_individual_mips_score', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('Org_nm', 70)->nullable();
            $table->string('Org_PAC_ID', 10)->nullable();
            $table->string('source', 20)->nullable();
            $table->string('quality_category_score', 5)->nullable();
            $table->string('ACI_category_score', 5)->nullable();
            $table->string('IA_category_score', 5)->nullable();
            $table->string('final_MIPS_score', 5)->nullable();



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cms_physician_individual_mips_score');
    }
}
