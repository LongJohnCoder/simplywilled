<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersUserPackageMappingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
      Schema::table('userPackageMapping', function (Blueprint $table) {
        $table->dropForeign(['coupon_id']);
      });
      \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

      Schema::table('users', function (Blueprint $table) {
        $table->integer('package_id')->nullable();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('users', function (Blueprint $table) {
        $table->dropColumn('package_id');
      });
    }
}
