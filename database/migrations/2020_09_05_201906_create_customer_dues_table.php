<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerDuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_dues', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('invoice_no');
            $table->float('original_amount');
            $table->unsignedBigInteger('cus_id');
            $table->string('paid_date');
            $table->float('paid_amount');
            $table->float('current_due');
            $table->foreign('invoice_no')->references('id')->on('sales')->onDelete('cascade');
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
        Schema::dropIfExists('customer_dues');
    }
}
