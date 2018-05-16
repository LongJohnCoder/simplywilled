<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateProvideYourLovedOnesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("ALTER TABLE provideYourLovedOnes MODIFY COLUMN is_tangible_property_distribute enum('1','2','3','4') NULL 
            COMMENT '1 -> To my child \n 2->To my spouse \n 3->Residue of estate \n 4->Some other way'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("ALTER TABLE provideYourLovedOnes MODIFY COLUMN is_tangible_property_distribute enum('0','1','2') NULL");
    }
}
