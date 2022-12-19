<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransferStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfer_stocks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transfer_form_id');
            $table->foreign('transfer_form_id')->references('id')->on('transfer_forms');
            $table->unsignedBigInteger('irf_id');
            $table->foreign('irf_id')->references('id')->on('irfs');
            $table->unsignedBigInteger('part_id');
            $table->foreign('part_id')->references('id')->on('parts');
            $table->unsignedBigInteger('stock_id')->nullable();
            $table->string('sn')->comment('for sn only')->nullable();
            $table->string('sn_return')->comment('for sn only')->nullable();
            $table->string('quantity')->comment('for non sn only')->nullable();
            $table->string('quantity_return')->comment('for non sn only')->nullable();
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
        Schema::dropIfExists('transfer_stocks');
    }
}
