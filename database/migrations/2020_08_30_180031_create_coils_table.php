<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coils', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('truck_no');
            $table->string('chalan_no');
            $table->float('rate');
            $table->float('quantity');
            $table->float('amount');
            $table->float('truck_fair');
            $table->float('total_amount');
            $table->unsignedBigInteger('supplier_id');
            $table->string('place_name');
            $table->string('remarks');
            $table->string('purchase_date');
            $table->foreign('supplier_id')->references('id')->on('supplier')->onDelete('cascade');
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
        Schema::dropIfExists('coils');
    }
}
