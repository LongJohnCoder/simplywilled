<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIndividualCharityColumnToProvideYourLovedOnes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('provideYourLovedOnes', function (Blueprint $table) {
            $table->boolean('individual')->nullable();
            $table->boolean('charity')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('provideYourLovedOnes', function (Blueprint $table) {
            $table->dropColumn('individual');
            $table->dropColumn('charity');
        });
    }
}
