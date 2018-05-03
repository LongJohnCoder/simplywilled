<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPartnerEmailFieldInTellUsAboutYou extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::table('tellUsAboutYou', function (Blueprint $table) {
           $table->string('partner_email')->nullable();
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
           $table->dropColumn('partner_email');
       });
     }
}
