<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekondisisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekondisis', function (Blueprint $table) {
            $table->id();            
            $table->unsignedBigInteger('request_stock_id');
            $table->foreign('request_stock_id')->references('id')->on('request_stocks'); 
            $table->enum('status', ['good same pack', 'good canibal', 'reject fungsi', 'reject fisik', 'not good']);
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
        Schema::dropIfExists('rekondisis');
    }
}
