<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->string('driverName');
            $table->string('mobile', 13)->unique();
            $table->string('mobile2', 13)->nullable();
            $table->date('date_of_joining')->nullable();
            $table->string('aadhar_number',20)->nullable();
            $table->string('aadhar_document')->nullable();
            $table->string('driver_photo')->nullable();
            $table->string('driving_licence_number',30)->nullable();
            $table->string('driving_licence_document')->nullable();
            $table->date('driving_licence_expiry')->nullable();
            $table->double('salary',16,2)->nullable();
            $table->string('address')->nullable();
            $table->date('date_of_leave')->nullable();
            $table->integer('status')->default(1)->comment('1:enable,0:disble');
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
        Schema::dropIfExists('drivers');
    }
}
