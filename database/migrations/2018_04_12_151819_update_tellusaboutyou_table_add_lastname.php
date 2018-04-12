<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTellusaboutyouTableAddLastname extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tellUsAboutYou', function (Blueprint $table) {
            $table->char('lastname')->after('firstname')->nullable();
            $table->char('middlename')->after('lastname')->nullable();
            $table->char('partner_lastname')->after('partner_firstname')->nullable();
            $table->char('partner_middlename')->after('partner_lastname')->nullable();

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tellUsAboutYou', function (Blueprint $table) {
            $table->dropColumn('lastname');
            $table->dropColumn('middlename');
            $table->dropColumn('partner_lastname');
            $table->dropColumn('partner_middlename');
        });
    }
}
