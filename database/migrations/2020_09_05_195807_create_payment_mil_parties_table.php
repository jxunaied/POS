<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentMilPartiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_mil_parties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('mil_party_id');
            $table->string('payment_date');
            $table->float('amount');
            $table->string('remarks');
            $table->foreign('mil_party_id')->references('id')->on('mil_parties')->onDelete('cascade');
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
        Schema::dropIfExists('payment_mil_parties');
    }
}
