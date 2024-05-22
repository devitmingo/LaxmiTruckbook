<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->bigInteger('mobile');
            $table->bigInteger('phone');
            $table->string('email',100);
            $table->string('gst_no',15);
            $table->string('pan_no',10);
            $table->string('address');
            $table->tinyInteger('createdby');
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
        Schema::dropIfExists('companies');
    }
}
