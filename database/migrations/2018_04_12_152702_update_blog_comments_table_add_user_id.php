<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateBlogCommentsTableAddUserId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('blogComments', function (Blueprint $table) {
          $table->integer('user_id')->unsigned()->after('parent_comment_id');
          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
      });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('blogComments', function (Blueprint $table) {
          $table->dropForeign(['user_id']);
          $table->dropColumn('user_id');
      });
    }
}
