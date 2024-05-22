<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePattasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pattas', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->integer('vehicleNumber');
            $table->integer('driverName');
            $table->string('place',150)->nullable();
            $table->string('meterReading',50)->nullable();
            $table->string('pattaStatus',10)->nullable();
            $table->string('photo')->nullable();
            $table->string('old_patta_deposite_place')->nullable();
            $table->string('staff',100)->nullable();
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
        Schema::dropIfExists('pattas');
    }
}
