<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCmsPhysicianProviderRegistryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_physician_provider_registry', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('NPI', 10)->nullable();
            $table->string('Ind_PAC_ID', 10)->nullable();
            $table->string('Ind_enrl_ID', 15)->nullable();
            $table->string('lst_nm', 35)->nullable();
            $table->string('frst_nm', 25)->nullable();
            $table->string('mid_nm', 25)->nullable();
            $table->string('suff', 10)->nullable();
            $table->string('gndr', 1)->nullable();
            $table->string('Cred', 3)->nullable();
            $table->string('Med_sch', 100)->nullable();
            $table->year('Grd_yr')->nullable();
            $table->string('Pri_spec', 50)->nullable();
            $table->string('Sec_spec_1', 50)->nullable();
            $table->string('Sec_spec_2', 50)->nullable();
            $table->string('Sec_spec_3', 50)->nullable();
            $table->string('Sec_spec_4', 50)->nullable();
            $table->string('Sec_spec_all', 200)->nullable();
            $table->string('Org_nm', 70)->nullable();
            $table->string('Org_PAC_ID', 10)->nullable();
            $table->integer('num_org_mem')->default(0);
            $table->string('adr_ln_1', 55)->nullable();
            $table->string('adr_ln_2', 55)->nullable();
            $table->string('ln_2_sprs', 1)->nullable();
            $table->string('city', 30)->nullable();
            $table->string('st', 2)->nullable();
            $table->string('zip', 9)->nullable();
            $table->string('phn_numbr', 20)->nullable();
            $table->string('hosp_afl_1', 6)->nullable();
            $table->string('hosp_afl_ibn_1', 70)->nullable();
            $table->string('hosp_afl_2', 6)->nullable();
            $table->string('hosp_afl_ibn_2', 70)->nullable();
            $table->string('hosp_afl_3', 6)->nullable();
            $table->string('hosp_afl_ibn_3', 70)->nullable();
            $table->string('hosp_afl_4', 6)->nullable();
            $table->string('hosp_afl_ibn_4', 70)->nullable();
            $table->string('hosp_afl_5', 6)->nullable();
            $table->string('hosp_afl_ibn_5', 70)->nullable();
            $table->string('assgn', 1)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cms_physician_provider_registry');
    }
}
