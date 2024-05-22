<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUrearefillingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('urearefillings', function (Blueprint $table) {
            $table->id();
            $table->integer('vehicle_id');
            $table->integer('driver_id');
            $table->string('place');
            $table->string('meter_reading');
            $table->date('refilling_date');
            $table->string('liter',30);
            $table->double('amount',16,2);
            $table->integer('created_by')->nullable();
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
        Schema::dropIfExists('urearefillings');
    }
}
