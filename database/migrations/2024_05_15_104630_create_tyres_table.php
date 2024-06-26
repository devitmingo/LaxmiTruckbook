<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTyresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tyres', function (Blueprint $table) {
            $table->id();
            $table->integer('vechicle_id');
            $table->string('vechicle_number');
            $table->string('tyre_type')->nullable();
            $table->string('serial_number')->nullable();
            $table->string('tyre_company_name')->nullable();
            $table->string('meter_reading')->nullable();
            $table->string('ending_meter_reading')->nullable();
            $table->date('upload_date')->nullable();
            $table->date('remove_upload_date')->nullable();
            $table->string('tyre_model')->nullable();
            $table->string('new_tyre_image')->nullable();
            $table->string('old_tyre_image')->nullable();
            $table->string('old_tyre_serial_number')->nullable();
            $table->string('old_tyre_company_name')->nullable();
            $table->tinyInteger('status')->comment('0:active,1:inactive,2:deleted')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('comapany_id')->nullable();
            $table->integer('session_id')->nullable();
            $table->string('self_warranty',10)->nullable();
            $table->double('amount',16,2)->nullable();
            $table->integer('vendor_name')->nullable();
            $table->integer('page')->nullable();
            $table->string('type',2)->default('cr');
            $table->string('paymentType',10)->nullable();
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
        Schema::dropIfExists('tyres');
    }
}
