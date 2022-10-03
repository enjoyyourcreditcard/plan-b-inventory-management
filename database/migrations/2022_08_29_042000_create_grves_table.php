<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrvesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('db_grfs', function (Blueprint $table) {
            $table->id();
            $table->string('grf_code');
            $table->string('surat_jalan')->nullable();
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('warehouse_id')->unsigned()->nullable();
            $table->foreign('warehouse_id')->references('id')->on('warehouse');
            $table->enum('status', ['draft', 'submited',"ic_approved",'wh_approved','delivery_approved','user_pickup','return','closed'])->default('draft'); //untuk sistem 
            $table->timestamp('ic_approved_date')->nullable();
            $table->timestamp('wh_approved_date')->nullable();
            $table->timestamp('delivery_approved_date')->nullable();
            $table->timestamp('user_pickup_date')->nullable();
            $table->timestamp('return_date')->nullable();
            $table->timestamp('closed_date')->nullable();
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
        Schema::dropIfExists('grves');
    }
}
