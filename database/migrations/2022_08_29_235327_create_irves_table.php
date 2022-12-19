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
        Schema::create('irfs', function (Blueprint $table) {
            $table->id();
            $table->string('irf_code');
            $table->bigInteger('warehouse_id')->unsigned()->nullable();
            $table->foreign('warehouse_id')->references('id')->on('warehouse');
            $table->string('warehouse_destination')->nullable();
            $table->string('surat_jalan')->nullable();
            $table->enum('type', ['transfer_rekondisi', 'transfer_antar_gudang', 'transfer_inbound']);
            $table->enum('status', ['draft', 'on_progress', 'delivery_approved', 'delivered', 'closed'])->default('draft'); 
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
        Schema::dropIfExists('irfs');
    }
};
