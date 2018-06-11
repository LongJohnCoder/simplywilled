<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPetsInfoColumnsToTellUsAboutYou extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tellUsAboutYou', function (Blueprint $table) {
            $table->boolean('has_pet')->nullable();
            $table->json('pet_names')->nullable();
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
            $table->dropColumn('has_pet');
            $table->dropColumn('pet_names');
        });
    }
}
