<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOtherRelationsColumnToHealthFinance extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('healthFinance', function (Blueprint $table) {
          $table->string('relationOther')->nullable();
          $table->string('backupRelationOther')->nullable();
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
          $table->dropColumn('relationOther');
          $table->dropColumn('backupRelationOther');
        });
    }
}
