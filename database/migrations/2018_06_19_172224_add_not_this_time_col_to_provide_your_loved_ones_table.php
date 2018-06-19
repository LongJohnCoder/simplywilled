<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNotThisTimeColToProvideYourLovedOnesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('provideYourLovedOnes', function (Blueprint $table) {  
            $table->boolean('not_this_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('provideYourLovedOnes', function (Blueprint $table) {  
            $table->dropColumn('not_this_time');
        });
    }
}
