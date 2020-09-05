<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentSoilSordersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_soil_sorders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('soil_sorder_id');
            $table->string('payment_date');
            $table->float('pay_amount');
            $table->string('remarks');
            $table->foreign('soil_sorder_id')->references('id')->on('soil_sordars')->onDelete('cascade');
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
        Schema::dropIfExists('payment_soil_sorders');
    }
}
