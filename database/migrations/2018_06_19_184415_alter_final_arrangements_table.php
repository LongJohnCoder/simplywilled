<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterFinalArrangementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("ALTER TABLE finalArrangements MODIFY COLUMN type enum('0','1','2') NULL COMMENT '0->Burried \n 1->Creamated \n 2->some_other_way'");

        Schema::table('finalArrangements' , function (Blueprint $table) {
            $table->text('some_other_way')->nullable()->after('arrangements')->comment('if type is 2 then required');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("ALTER TABLE finalArrangements MODIFY COLUMN type enum('0','1') NULL COMMENT '0->Burried \n 1->Creamated'");

        Schema::table('finalArrangements' , function (Blueprint $table) {
            $table->dropColumn('some_other_way');
        });
    }
}
