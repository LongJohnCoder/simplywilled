<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExecutorTitileColumnToStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('states_information', function (Blueprint $table) {  
            $table->enum('executor_title',['Personal Representative','Executor'])->nullable()->after('type')->comment('executor title in different states');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('states_information', function (Blueprint $table) {  
            $table->dropColumn('executor_title');
        });
    }
}
