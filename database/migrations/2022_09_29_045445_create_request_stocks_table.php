<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_stocks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('request_form_id');
            $table->foreign('request_form_id')->references('id')->on('dbs_request_forms');
            $table->unsignedBigInteger('grf_id');
            $table->foreign('grf_id')->references('id')->on('db_grfs');
            $table->unsignedBigInteger('part_id');
            $table->foreign('part_id')->references('id')->on('parts');
            $table->string('sn');
            $table->string('sn_return')->nullable();
            $table->string('condition')->nullable();
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('request_stocks');
    }
}