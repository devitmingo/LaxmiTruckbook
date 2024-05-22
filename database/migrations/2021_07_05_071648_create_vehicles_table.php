<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('vehicleNumber',12)->unique();
            $table->string('vehicleType',30);
            $table->integer('ownership');
            $table->integer('driver_id')->nullable();
            $table->integer('supplier_id')->nullable();
            $table->string('driver_name',50)->nullable();
            $table->string('driver_contact',20)->nullable();
            $table->string('vehicle_tyre',5)->nullable();
            $table->string('vehicle_model',30)->nullable();
            $table->string('manufacturer_company',70)->nullable();
            $table->string('chassis_no',30)->nullable();
            $table->string('engine_no',30)->nullable();
            $table->string('r_c_document')->nullable();
            $table->date('insurance_start_date')->nullable();
            $table->date('insurance_expiry_date')->nullable();
            $table->string('status')->comment('0:active,1:inactive,2:deleted')->nullable();
            $table->integer('createdby')->nullable();
            $table->integer('comapany_id')->nullable();
            $table->integer('session_id')->nullable();
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}
