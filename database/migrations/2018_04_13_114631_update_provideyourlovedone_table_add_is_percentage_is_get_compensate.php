<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateProvideyourlovedoneTableAddIsPercentageIsGetCompensate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('provideYourLovedOnes', function (Blueprint $table) {
            $table->enum('is_percentage',[0,1])->after('farm_or_ranch')->nullable();
            $table->enum('is_getcompensate',[0,1])->default(0)->after('is_percentage')->nullable();
            $table->enum('is_tangible_property_distribute',[0,1,2])->default(0)->after('tangible_property_distribute')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('provideYourLovedOnes', function (Blueprint $table) {
            $table->dropColumn('is_percentage');
            $table->dropColumn('is_getcompensate');
            $table->dropColumn('is_tangible_property_distribute');
        });
    }
}
