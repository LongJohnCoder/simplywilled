<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateGiftsChangeTypesEnumField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         DB::statement("ALTER TABLE gifts MODIFY 	type ENUM('1','2','3','4','5','6') NULL");
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
