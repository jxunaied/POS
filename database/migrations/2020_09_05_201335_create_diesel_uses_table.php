<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDieselUsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diesel_uses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('date');
            $table->float('amount');
            $table->unsignedBigInteger('party_id');
            $table->foreign('party_id')->references('id')->on('diesel_mils')->onDelete('cascade');
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
        Schema::dropIfExists('diesel_uses');
    }
}
