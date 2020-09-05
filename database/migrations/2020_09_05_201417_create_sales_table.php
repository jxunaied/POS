<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('sales_date');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('cus_id');
            $table->float('quantity');
            $table->float('rate');
            $table->float('discount_amount');
            $table->float('total');
            $table->float('paid');
            $table->float('due');
            $table->string('remarks');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('cus_id')->references('id')->on('customers')->onDelete('cascade');
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
        Schema::dropIfExists('sales');
    }
}
