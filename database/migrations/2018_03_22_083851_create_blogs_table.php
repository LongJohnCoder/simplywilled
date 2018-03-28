<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('author_id')->unsigned();
            $table->string('title');
            $table->string('slug');
            $table->string('seo_title')->nullable();
            $table->longText('body')->nullable();
            $table->string('image')->nullable();
            $table->string('meta_description')->nullable();
            $table->json('meta_keywords')->nullable();
            $table->enum('status',['0','1'])->default('0')->comment('0=>Unpublished, 1=>Published');
            $table->enum('featured',['0','1'])->default('0')->comment('0=>Inactive, 1=>Active');
            $table->integer('total_views')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->index(['title','slug']);
            $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
