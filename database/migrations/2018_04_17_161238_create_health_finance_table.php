<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHealthFinanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('healthFinance', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userId')->unsigned();
            $table->string('fullLegalName')->nullable()->comment('user legal name');
            $table->string('relation')->nullable();
            $table->text('address')->nullable()->comment('user valid address');
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->integer('zip')->nullable();
            $table->string('country')->nullable();
            $table->boolean('isInform')->default(false)->nullable();
            $table->string('emailOfAgent')->nullable();

            $table->boolean('isBackupAgent')->default(false)->nullable();
            $table->string('backupFullLegalName')->nullable();
            $table->string('backupRelation')->nullable();
            $table->text('backupAddress')->nullable();
            $table->string('backupCity')->nullable();
            $table->string('backupState')->nullable();
            $table->integer('backupZip')->nullable();
            $table->string('backupCountry')->nullable();
            $table->boolean('isInformBackup')->default(false)->nullable();
            $table->string('emailOfBackupAgent')->nullable();
            $table->timestamps();

            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('healthFinance');
    }
}
