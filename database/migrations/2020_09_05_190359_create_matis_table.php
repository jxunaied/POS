<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('soil_sorder_id');
            $table->string('measurement');
            $table->float('total_cft');
            $table->float('rate');
            $table->float('amount');
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('matis');
    }
}
