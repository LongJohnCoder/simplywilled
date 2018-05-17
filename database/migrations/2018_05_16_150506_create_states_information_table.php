<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatesInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('states_information', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',60)->index()->nullable();
            $table->string('code')->nullable();
            $table->string('act')->nullable();
            $table->enum('type',['uniform','non-uniform'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('states_information');
    }
}
