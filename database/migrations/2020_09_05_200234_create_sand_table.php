<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSandTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sand', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('date');
            $table->string('drum_truck')->nullable();
            $table->string('tc')->nullable();
            $table->float('quantity_cft');
            $table->float('rate');
            $table->float('truck_fair');
            $table->float('total_amount');
            $table->string('place_name');
            $table->string('remarks');
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
        Schema::dropIfExists('sand');
    }
}
