<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogComments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('blog_id')->unsigned();
            $table->string('name');
            $table->string('email');
            $table->longText('message');
            $table->enum('status',['0','1'])->default('0')->comment('0=>Unapproved, 1=>Approved');
            $table->integer('parent_comment_id')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->index(['email']);
            $table->foreign('blog_id')->references('id')->on('blogs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogComments');
    }
}
