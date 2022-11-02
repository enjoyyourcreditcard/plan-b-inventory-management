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
            $table->string('warehouse_destination')->nullable();
            $table->enum('type', ['request', 'transfer rekondisi', 'transfer gudang lama', 'transfer gudang baru'])->default('request');
            $table->enum('status', ['draft', 'submited',"ic_approved",'wh_approved','delivery_approved','user_pickup','return', 'return_ic_approved', 'return_wh_approved','closed'])->default('draft'); //untuk sistem 
            $table->boolean('is_emergency')->default(0); // emergency or not
            $table->string('file')->nullable(); //emergency
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
        Schema::dropIfExists('db_grfs');
    }
}
