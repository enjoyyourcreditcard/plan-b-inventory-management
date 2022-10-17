<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dbs_request_forms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('grf_id');
            $table->foreign('grf_id')->references('id')->on('db_grfs');
            $table->unsignedBigInteger('segment_id');
            $table->foreign('segment_id')->references('id')->on('segments');
            $table->unsignedBigInteger('part_id')->nullable();
            $table->foreign('part_id')->references('id')->on('parts')->nullable();
            $table->integer('quantity');
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
        Schema::dropIfExists('request_forms');
    }
}