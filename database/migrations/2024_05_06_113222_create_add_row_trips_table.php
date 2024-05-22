<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddRowTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trips', function (Blueprint $table) {
            $table->date('unloading_date')->nullable();
            $table->double('diesel_adv_transport',16,2)->nullable();
            $table->double('driver_cash_transport',16,2)->nullable();
            $table->double('unload_rate_per',16,2)->nullable()->nullable();
            $table->double('unload_unit_per',16,2)->nullable()->nullable();
            $table->double('unload_weight_per',16,2)->nullable()->nullable();
            $table->double('shortage_qty',16,2)->nullable()->nullable();
            $table->double('shortage_amount',16,2)->nullable()->nullable();
            $table->double('extra_diesel_amout',16,2)->nullable()->nullable();
            $table->double('beverage_amount',16,2)->nullable()->nullable();
            $table->double('total_receive',16,2)->nullable()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       // Schema::dropIfExists('add_row_trips');
    }
}
