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
        if (Schema::hasColumn('gifts', 'gift_type'))
        {
            Schema::table('gifts', function (Blueprint $table) {
                $table->dropColumn('gift_type');
            });

            Schema::table('gifts', function (Blueprint $table) {
                $table->boolean('individual')->nullable();
                $table->boolean('charity')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gifts', function (Blueprint $table) {
            $table->dropColumn('individual');
            $table->dropColumn('charity');
        });
    }
}
