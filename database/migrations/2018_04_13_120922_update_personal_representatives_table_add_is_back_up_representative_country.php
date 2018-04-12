<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePersonalRepresentativesTableAddIsBackUpRepresentativeCountry extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('personalRepresentatives', function (Blueprint $table) {
            $table->char('country')->after('address')->nullable();
            $table->enum('is_backuprepresentative',[0,1])->default(0)->after('email')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('personalRepresentatives', function (Blueprint $table) {
            $table->dropColumn('country');
            $table->dropColumn('is_backuprepresentative');
        });
    }
}
