<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateChildrensTableDobToDate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
     {
         DB::statement("ALTER TABLE children MODIFY dob date NULL");
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
