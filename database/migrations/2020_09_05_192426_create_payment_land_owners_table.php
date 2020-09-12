<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentLandOwnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_land_owners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('land_owners_id');
            $table->string('payment_date');
            $table->string('year');
            $table->float('amount');
            $table->string('remarks')->nullable();
            $table->foreign('land_owners_id')->references('id')->on('land_owners')->onDelete('cascade');
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
        Schema::dropIfExists('payment_land_owners');
    }
}
