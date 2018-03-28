<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaqFaqCategoryMappingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faqFaqCategoryMapping', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('faq_category_id')->unsigned();
            $table->integer('faq_id')->unsigned();
            $table->timestamps();

            $table->foreign('faq_category_id')->references('id')->on('faqCategories')->onDelete('cascade');
            $table->foreign('faq_id')->references('id')->on('faqs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('faqFaqCategoryMapping');
    }
}
