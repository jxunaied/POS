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
            $table->string('sales_date');
            $table->unsignedBigInteger('cus_id');
            $table->float('discount_amount', 10, 0)->unsigned();
            $table->float('total',10, 0)->unsigned();
            $table->float('paid',10, 0)->unsigned();
            $table->float('due',10, 0)->unsigned();
            $table->string('remarks')->nullable();
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
