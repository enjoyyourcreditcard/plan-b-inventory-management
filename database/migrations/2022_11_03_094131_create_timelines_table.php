<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimelinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timelines', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('grf_id')->nullable();
            $table->foreign('grf_id')->references('id')->on('db_grfs');
            $table->unsignedBigInteger('inbound_grf_id')->nullable();
            $table->foreign('inbound_grf_id')->references('id')->on('inbound_grfs');
            $table->enum('status', ['draft', 'submited',"ic_approved",'wh_approved','delivery_approved','user_pickup','return', 'return_ic_approved', 'return_wh_approved','closed'])->default('draft'); //untuk sistem 
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
        Schema::dropIfExists('timelines');
    }
}
