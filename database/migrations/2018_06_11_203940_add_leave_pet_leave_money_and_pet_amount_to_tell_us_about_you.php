<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLeavePetLeaveMoneyAndPetAmountToTellUsAboutYou extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tellUsAboutYou', function (Blueprint $table) {
            $table->boolean('leaveMoney')->nullable()->comment('required for pets field');
            $table->float('petAmount')->nullable()->comment('required for pets amount for pets care');
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
            $table->dropColumn('leaveMoney');
            $table->dropColumn('petAmount');
        });
    }
}
