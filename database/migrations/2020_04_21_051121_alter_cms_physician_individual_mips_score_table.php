<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCmsPhysicianIndividualMipsScoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cms_physician_individual_mips_score', function (Blueprint $table) {
            $table->dropColumn('Org_nm');
            $table->string('NPI',10)->after('updated_at')->nullable();
            $table->string('Ind_PAC_ID', 10)->after('NPI')->nullable();
            $table->string('lst_nm', 35)->after('Ind_PAC_ID')->nullable();
            $table->string('frst_nm', 25)->after('lst_nm')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cms_physician_individual_mips_score', function (Blueprint $table) {
            $table->dropColumn('lst_nm');
            $table->dropColumn('frst_nm');
            $table->dropColumn('NPI');
           $table->string('Org_nm',70);
        });
    }
}
