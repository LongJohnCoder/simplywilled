<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIndividualCharityColumnToGifts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('gifts', function (Blueprint $table) {
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
        if(Schema::hasColumn('gifts', 'individual')) {
            Schema::table('gifts', function (Blueprint $table) {
                $table->dropColumn('individual');
            });
        }

        if(Schema::hasColumn('gifts', 'charity')) {
            Schema::table('gifts', function (Blueprint $table) {
                $table->dropColumn('charity');
            });
        }
    }
}
