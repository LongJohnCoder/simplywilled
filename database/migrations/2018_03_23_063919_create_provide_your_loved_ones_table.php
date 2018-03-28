<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvideYourLovedOnesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provideYourLovedOnes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->enum('business_interest',['0','1'])->default('0')->comment('0=> No, 1=>Yes');
            $table->enum('farm_or_ranch',['0','1'])->default('0')->comment('0=> No, 1=>Yes');
            $table->float('compensation_specific_amount',8, 2)->default(0.00);
            $table->float('compensation_percent_amount',8, 2)->default(0.00);
            $table->enum('net_value_percent',['0','1'])->default('0')->comment('0=> No, 1=>Yes');
            $table->enum('residue_to_partner_first',['0','1'])->default('0')->comment('0=> No, 1=>Yes');
            $table->string('tangible_property_distribute')->nullable();
            $table->enum('specific_gifts',['0','1'])->default('0')->comment('0=> No, 1=>Yes');
            $table->enum('is_complete',['0','1'])->default('0')->comment('0=> No, 1=>Yes');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('provideYourLovedOnes');
    }
}
