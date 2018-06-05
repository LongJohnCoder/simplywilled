<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddReferalOtherFieldToTellUsAboutYouTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tellUsAboutYou', function (Blueprint $table) {
          $table->string('referral_other')->nullable();
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
          $table->dropColumn('referral_other');
        });
    }
}
