<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTellUsAboutYouTableChangeDobDatetimeToDate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       DB::statement("ALTER TABLE tellUsAboutYou MODIFY dob date null");
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
       
     }
}
