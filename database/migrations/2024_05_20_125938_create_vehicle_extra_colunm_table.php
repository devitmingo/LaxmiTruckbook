<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleExtraColunmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vehicles', function (Blueprint $table) {
            $table->string('insurance_document')->nullable();
            $table->date('r_c_expiry_date')->nullable();
            $table->string('fitness_document')->nullable();
            $table->date('fitness_expiry_date')->nullable();
            $table->string('tax_pay_document')->nullable();
            $table->date('tax_pay_expiry_date')->nullable();
            $table->string('permit_document')->nullable();
            $table->date('permit_expiry_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicle_extra_colunm');
    }
}
