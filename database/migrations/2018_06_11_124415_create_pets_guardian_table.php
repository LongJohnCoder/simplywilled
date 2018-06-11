<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePetsGuardianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pets_guardian', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->index()->unsigned();
            $table->string('fullname')->nullable();
            $table->string('phone')->nullabale();
            $table->string('relationship_with')->nullable();
            $table->string('relationship_other')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->string('country')->nullable();
            $table->enum('email_notification',['0','1'])->default('0')->comment('0=> No, 1=>Yes')->nullable();
            $table->string('email')->nullable();
            $table->enum('is_backup',['0','1'])->default('0')->comment('0=> No, 1=>Yes');
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
        Schema::dropIfExists('pets_guardian');
    }
}
