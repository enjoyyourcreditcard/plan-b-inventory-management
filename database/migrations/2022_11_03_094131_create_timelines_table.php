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
            $table->unsignedBigInteger('irf_id')->nullable();
            $table->foreign('irf_id')->references('id')->on('irfs');
            $table->enum('status', ['draft', 'submited',"ic_approved",'wh_approved','delivery_approved','user_pickup','return', 'return_ic_approved', 'return_wh_approved','closed','reject', 'on_progress', 'delivered'])->default('draft'); //untuk sistem 
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
