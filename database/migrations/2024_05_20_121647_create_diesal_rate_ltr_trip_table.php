<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiesalRateLtrTripTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trips', function (Blueprint $table) {
            $table->double('diesel_rate',16,2);
            $table->double('diesel_ltr',16,2);
            $table->double('extra_diesel_rate',16,2);
            $table->double('extra_diesel_ltr',16,2);
            $table->integer('page')->nullable();
            $table->string('type',2)->default('cr');
            $table->string('paymentType',10)->nullable();
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diesal_rate_ltr_trip');
    }
}
