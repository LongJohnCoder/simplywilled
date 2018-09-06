<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPercentageGiftsToGiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('gifts', function (Blueprint $table) {
            $table->json('percentage_gifts')->nullable()->after('disinherit_details');
        //   $table->enum('type',['1','2','3','4','5','6','7'])->after('user_id');
        //    DB::statement("ALTER TABLE gifts MODIFY type ENUM('1','2','3','4','5','6','7')");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gifts', function (Blueprint $table) {
            $table->dropColumn('percentage_gifts');
        //    DB::statement("ALTER TABLE gifts DROP COLUMN type");
        });
    }
}
