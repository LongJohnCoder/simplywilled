<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterHealthFinanceName extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('healthFinance', function (Blueprint $table) {
            $table->dropColumn(['fullLegalName', 'backupFullLegalName','isInform','isBackupAgent','isInformBackup']);
            $table->string('firstLegalName')->nullable();
            $table->string('lastLegalName')->nullable();
            $table->string('backupfirstLegalName')->nullable();
            $table->string('backuplastLegalName')->nullable();
            $table->string('phone')->nullable();
            $table->string('backupphone')->nullable();
            $table->string('willInform')->nullable();
            $table->string('anyBackupAgent')->nullable();
            $table->string('willInformBackup')->nullable();

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
          $table->string('fullLegalName')->nullable();
          $table->string('backupFullLegalName')->nullable();
          $table->dropColumn(['firstLegalName',
                              'lastLegalName',
                              'backupfirstLegalName',
                              'backuplastLegalName',
                              'phone',
                              'backupphone']
                            );
        });
    }
}
