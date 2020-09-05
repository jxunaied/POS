<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMakingBricksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('making_bricks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('mil_party_id');
            $table->string('date');
            $table->integer('brick_amount');
            $table->float('payable');
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
        Schema::dropIfExists('making_bricks');
    }
}
