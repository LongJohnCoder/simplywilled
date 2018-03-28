<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserPackageMappingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userPackageMapping', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('package_id')->unsigned();
            $table->dateTime('started_on');
            $table->dateTime('renew_date');
            $table->string('payment_method')->nullable();
            $table->string('payment_token')->nullable();
            $table->enum('payment_status',['0','1','2'])->default('0')->comment('0=>Failed, 1=>Pending 2=>Success');
            $table->json('payment_response')->nullable();
            $table->float('amount',8,2)->default(0.00);
            $table->integer('coupon_id')->unsigned();
            $table->float('coupon_amount',8,2)->default(0.00);
            $table->enum('status',['0','1','2'])->default('0')->comment('0=>Inactive, 1=>Active 2=>Expired');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade');
            $table->foreign('coupon_id')->references('id')->on('coupons')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('userPackageMapping');
    }
}
