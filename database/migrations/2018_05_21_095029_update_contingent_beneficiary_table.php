<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateContingentBeneficiaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contingent_beneficiary', function (Blueprint $table) {
            $table->enum('distribution_type',['to_my_heirs','other'])->nullable()->after('is_contingent_beneficiary');
            $table->text('info')->nullable()->after('distribution_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contingent_beneficiary', function (Blueprint $table) {
            $table->dropColumn('distribution_type');
            $table->dropColumn('info');
        });
    }
}
