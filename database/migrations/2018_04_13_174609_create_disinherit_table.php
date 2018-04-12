<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisinheritTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disinherit', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('disinherit',[0,1])->comment('0->Yes, 1->No')->nullable();
            $table->char('fullname')->nullable();
            $table->char('relationship')->nullable();
            $table->char('other_relationship')->nullable();
            $table->enum('gender',['M','F'])->comment('M->Male, F->Female')->nullable();
            $table->enum('is_complete',[0,1])->comment('0->No, 1->Yes')->nullable();
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
        Schema::dropIfExists('disinherit');
    }
}
