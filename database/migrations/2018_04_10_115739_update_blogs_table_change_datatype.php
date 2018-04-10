<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateBlogsTableChangeDatatype extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        DB::statement("ALTER TABLE blogs MODIFY meta_keywords text");
        DB::statement("ALTER TABLE blogs MODIFY meta_description text");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        DB::statement("ALTER TABLE blogs MODIFY meta_keywords VARCHAR");
        DB::statement("ALTER TABLE blogs MODIFY meta_description VARCHAR");
    }
}
