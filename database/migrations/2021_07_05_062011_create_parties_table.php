<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parties', function (Blueprint $table) {
            $table->id();
            $table->string('partyName');
            $table->string('owner_name')->nullable();
            $table->string('mobile',13)->unique();
            $table->string('mobile2',13)->nullable();
            $table->string('gst_no',20)->nullable();
            $table->string('pan_no',20)->nullable();
            $table->date('opening_date',20)->nullable();
            $table->double('opening_balance',16,2)->nullable();
            $table->string('address')->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('parties');
    }
}
