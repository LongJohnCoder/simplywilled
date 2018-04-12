<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContingentBeneficiaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contingent_beneficiary', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->enum('is_contingent_beneficiary',[0,1])->deafult('0')->comment('1->YES, 2->No')->nullable();
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
        Schema::dropIfExists('contingent_beneficiary');
    }
}
