<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToTellUsAboutYouTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tellUsAboutYou', function (Blueprint $table) {
          $table->enum('partner_invitation',['1','0'])->nullable();
          $table->string('referral')->nullable();
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
          $table->dropColumn('partner_invitation');
          $table->dropColumn('referral');
        });
    }
}
