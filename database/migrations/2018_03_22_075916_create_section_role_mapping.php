<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionRoleMapping extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sectionRoleMapping', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('role_id')->unsigned();
            $table->integer('section_id')->unsigned();
            $table->enum('create_permission',['0','1'])->default('0')->comment('0=> No, 1=>Yes');
            $table->enum('update_permission',['0','1'])->default('0')->comment('0=> No, 1=>Yes');
            $table->enum('read_permission',['0','1'])->default('0')->comment('0=> No, 1=>Yes');
            $table->enum('delete_permission',['0','1'])->default('0')->comment('0=> No, 1=>Yes');
            $table->timestamps();

            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sectionRoleMapping');
    }
}
