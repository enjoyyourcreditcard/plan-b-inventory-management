<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransferFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfer_forms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('grf_id');
            $table->foreign('grf_id')->references('id')->on('db_grfs');
            $table->unsignedBigInteger('part_id');
            $table->foreign('part_id')->references('id')->on('parts');
            $table->integer('quantity');
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
        Schema::dropIfExists('transfer_forms');
    }
}
