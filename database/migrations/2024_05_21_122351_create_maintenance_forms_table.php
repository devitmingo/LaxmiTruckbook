<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaintenanceFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenance_forms', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->integer('maintenance');
            $table->integer('vehicleNumber');
            $table->integer('driverName');
            $table->string('meterReading',50)->nullable();
            $table->string('productType',3)->nullable();
            $table->string('place',150)->nullable();
            $table->string('shop_name',150)->nullable();
            $table->string('staff',100)->nullable();
            $table->string('self_warranty',100)->nullable();
            $table->double('amount',16,2)->nullable();
            $table->string('paymentType',10)->nullable();
            $table->integer('vendorName')->nullable();
            $table->string('notes')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('session_id')->nullable();
            $table->integer('comapany_id')->nullable();
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
        Schema::dropIfExists('maintenance_forms');
    }
}
