<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFullnameColumnToHealthFinance extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('healthFinance', function (Blueprint $table) {
          $table->string('fullname')->nullable();
          $table->string('backupFullname')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('healthFinance', function (Blueprint $table) {
          $table->dropColumn('fullname');
          $table->dropColumn('backupFullname');
        });
    }
}
