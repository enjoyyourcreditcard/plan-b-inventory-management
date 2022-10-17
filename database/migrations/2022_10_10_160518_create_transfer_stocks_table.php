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
            $table->unsignedBigInteger('grf_id');
            $table->foreign('grf_id')->references('id')->on('db_grfs');
            $table->unsignedBigInteger('part_id');
            $table->foreign('part_id')->references('id')->on('parts');
            $table->string('sn')->nullable();
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
