<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGearKlatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gear_klatches', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->integer('vendorNumber');
            $table->integer('driverName');
            $table->string('place',150)->nullable();
            $table->string('meterReading',50)->nullable();
            $table->string('shop_name',150)->nullable();
            $table->string('staff',100)->nullable();
            $table->string('clutchplate',1)->nullable();
            $table->string('clutchplate_company',150)->nullable();
            $table->string('fravil',1)->nullable();
            $table->string('fravil_company',150)->nullable();
            $table->string('prasor_plate',1)->nullable();
            $table->string('prasor_plate_company',150)->nullable();
            $table->string('release_bearing',1)->nullable();
            $table->string('release_bearing_company',150)->nullable();
            $table->string('self_warranty',100)->nullable();
            $table->string('mistri',100)->nullable();
            $table->string('paymentType',10)->nullable();
            $table->integer('vendorName')->nullable();
            $table->integer('created_by')->nullable();
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
        Schema::dropIfExists('gear_klatches');
    }
}
