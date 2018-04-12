<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateGuardianInfoTableAddIsBackup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('guardianInfo', function (Blueprint $table) {
            $table->char('country')->after('address')->nullable();
            $table->enum('is_backup',[0,1])->default(0)->after('email')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('guardianInfo', function (Blueprint $table) {
            $table->dropColumn('is_backup');
            $table->dropColumn('country');
        });
    }
}
