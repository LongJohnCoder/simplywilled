<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstateDisrtibuteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estate_disrtibute', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->enum('distribute_type',[1,2,3,4])->default('1')->comment('1=>to_a_single_beneficiary, 2=>to_multiple_beneficiary, 3=>to_my_heirs_law, 4 =>some_other_way')->nullable();
            $table->json('to_a_single_beneficiary')->nullable();
            $table->json('to_multiple_beneficiary')->nullable();
            $table->json('to_my_heirs_law')->nullable();
            $table->json('some_other_way')->nullable();
            $table->enum('is_complete',[0,1])->default('0')->nullable()->comment('1=>Complete, 2=>Not Complete');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estate_disrtibute');
    }
}
