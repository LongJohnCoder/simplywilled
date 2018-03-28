<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalGiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gifts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->enum('type',['0','1','2','3'])->default('1')->comment('0=> Cash, 1=>Real Property, 2=>Business Interest, 3=>Specific Asset');
            $table->json('cash_description')->nullable()->comment('');
            $table->json('property_details')->nullable()->comment('');
            $table->json('business_details')->nullable()->comment('');
            $table->json('asset_details')->nullable()->comment('');
            $table->json('rest_deatils')->nullable()->comment('');
            $table->json('disinherit_details')->nullable()->comment('');
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
        Schema::dropIfExists('gifts');
    }
}
