<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterBlogsTableExcerpt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blogs', function (Blueprint $table) {
          $table->longText('excerpt')->nullable()->after('body');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blogs', function (Blueprint $table) {
          $table->dropColumn('excerpt');
        });
    }
}
