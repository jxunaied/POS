<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMilPartiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mil_parties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->float('balance', 10, 0)->default(0)->unsigned();
            $table->float('due', 10, 0)->default(0)->unsigned();
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
        Schema::dropIfExists('mil_parties');
    }
}
