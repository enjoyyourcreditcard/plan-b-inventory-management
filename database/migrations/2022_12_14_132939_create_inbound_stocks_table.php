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
        Schema::create('inbound_stocks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('inbound_id')->unsigned();
            $table->foreign('inbound_id')->references('id')->on('inbounds');
            $table->integer('quantity')->comment('non sn only')->nullable();
            $table->string('sn_code')->comment('sn only')->nullable();
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
        Schema::dropIfExists('inbound_stocks');
    }
};
