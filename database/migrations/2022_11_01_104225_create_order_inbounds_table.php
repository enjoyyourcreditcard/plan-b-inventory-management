<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_inbounds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('grf_inbound_id');
            $table->foreign('grf_inbound_id')->references('id')->on('inbound_grfs');
            $table->unsignedBigInteger('inbound_id')->nullable();
            $table->foreign('inbound_id')->references('id')->on('inbounds');
            $table->string('received_sn_code')->nullable()->comment('for sn only');
            $table->integer('quantity')->nullable()->comment('for non sn only');
            $table->integer('received_quantity')->nullable()->comment('for non sn only');
            $table->unsignedBigInteger('part_id')->nullable();
            $table->foreign('part_id')->references('id')->on('parts');
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
        Schema::dropIfExists('order_inbounds');
    }
};
