<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInboundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inbounds', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('irf_id')->unsigned();
            $table->foreign('irf_id')->references('id')->on('irfs');
            $table->bigInteger('warehouse_id')->unsigned();
            $table->foreign('warehouse_id')->references('id')->on('warehouse');
            $table->bigInteger('part_id')->unsigned();
            $table->foreign('part_id')->references('id')->on('parts');
            $table->string('brand');
            $table->integer('quantity');
            $table->string('nomor_po');
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
        Schema::dropIfExists('inbounds');
    }
}
