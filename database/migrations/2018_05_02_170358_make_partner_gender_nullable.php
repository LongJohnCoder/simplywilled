<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakePartnerGenderNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         DB::statement("ALTER TABLE tellUsAboutYou MODIFY 	partner_gender ENUM('M','F') NULL");
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         //
     }
}
