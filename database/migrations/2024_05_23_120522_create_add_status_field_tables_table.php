<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddStatusFieldTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payment_types', function (Blueprint $table) {
            $table->integer('status')->default('1')->comment('1:enable,0:disable');
        });

        Schema::table('advance_types', function (Blueprint $table) {
            $table->integer('status')->default('1')->comment('1:enable,0:disable');
        });

        Schema::table('charges_types', function (Blueprint $table) {
            $table->integer('status')->default('1')->comment('1:enable,0:disable');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('add_status_field_tables');
    }
}
