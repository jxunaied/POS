<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleAtaGlancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_ata_glances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('date');
            $table->integer('qty_bricks');
            $table->float('opening_balance');
            $table->float('cash_sale');
            $table->float('dues');
            $table->float('acc_receivable');
            $table->float('advance');
            $table->float('gross_sales');
            $table->float('expense');
            $table->float('net_sales');
            $table->float('deposits');
            $table->float('closing_balance');
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
        Schema::dropIfExists('sale_ata_glances');
    }
}
