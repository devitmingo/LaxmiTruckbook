<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKinpinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kinpins', function (Blueprint $table) {
                $table->id();
                $table->date('date');
                $table->integer('vendorNumber');
                $table->integer('driverName');
                $table->string('place',150)->nullable();
                $table->string('meterReading',50)->nullable();
                $table->string('shop_name',150)->nullable();
                $table->string('staff',100)->nullable();
                $table->string('front_1',100)->nullable();
                $table->string('front_2',100)->nullable();
                $table->string('self_warranty',100)->nullable();
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
        Schema::dropIfExists('kinpins');
    }
}
