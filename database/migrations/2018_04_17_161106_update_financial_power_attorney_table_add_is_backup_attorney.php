<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateFinancialPowerAttorneyTableAddIsBackupAttorney extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('financialPowerAttorney', function (Blueprint $table) {
            $table->enum('is_backupattorney',[0,1])->default(0)->after('user_id')->nullable();
            $table->json('attorney_backup')->after('attorney_holders')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('financialPowerAttorney', function (Blueprint $table) {
            $table->dropColumn('is_backupattorney');
            $table->dropColumn('backup_authority');
        });
    }
}
