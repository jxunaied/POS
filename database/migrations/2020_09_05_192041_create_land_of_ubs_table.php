<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandOfUbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('land_of_ubs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('kata');
            $table->float('decimal');
            $table->unsignedBigInteger('land_owners_id');
            $table->string('remarks');
            $table->foreign('land_owners_id')->references('id')->on('land_owners')->onDelete('cascade');
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
        Schema::dropIfExists('land_of_ubs');
    }
}
