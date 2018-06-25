<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAbbreviationColumnToStatesInformation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('states_information', function (Blueprint $table) {
            $table->string('abr',2)->nullable()->after('executor_title')->comment('abbreviation of states');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('states_information', function (Blueprint $table) {
            $table->dropColumn('abr');
        });
    }
}
