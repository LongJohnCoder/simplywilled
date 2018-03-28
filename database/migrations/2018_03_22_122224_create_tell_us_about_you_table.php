<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTellUsAboutYouTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tellUsAboutYou', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('firstname');
            $table->string('fullname');
            $table->enum('gender',['M','F'])->default('M')->comment('M=> Male, F=>Female');
            $table->dateTime('dob')->nullable();
            $table->enum('marital_status',['S','M','R','D','W'])->default('S')->comment('S=>Single, M=>Married, R=>Domestic Relationship, D=>Divorced, W=>Widowed');
            $table->string('partner_firstname')->nullable();
            $table->string('partner_fullname')->nullable();
            $table->enum('partner_gender',['M','F'])->default('M')->comment('M=> Male, F=>Female');
            $table->enum('registered_partner',['0','1'])->default('0')->comment('0=> No, 1=>Yes');
            $table->enum('legal_married',['0','1'])->default('0')->comment('0=> No, 1=>Yes');
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->string('signed_at')->nullable();
            $table->integer('children')->default(0);
            $table->enum('deceased_children',['0','1'])->default('0')->comment('0=> No, 1=>Yes');
            $table->string('deceased_children_names')->nullable();
            $table->enum('guardian_minor_children',['0','1'])->default('0')->comment('0=> No, 1=>Yes');
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
        Schema::dropIfExists('tellUsAboutYou');
    }
}
