<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterPackagesSlug extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('packages', function (Blueprint $table) {
          $table->string('slug')->unique();
        });
        Schema::table('users', function (Blueprint $table) {
          $table->dropColumn('package_id');
          $table->string('package')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('packages', function (Blueprint $table) {
          $table->dropColumn('slug');
        });
        Schema::table('users', function (Blueprint $table) {
          $table->dropColumn('package');
          $table->integer('package_id')->nullable();
        });
    }
}
