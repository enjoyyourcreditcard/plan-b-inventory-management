<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarehouseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('db_warehouses_function', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('regional', ['jakarta', 'depok', 'bogor', 'bekasi', 'tanggerang', 'bandung', 'solo', 'medan']);
            $table->string('city');
            $table->string('location');
            $table->string('type');
            $table->enum('contract_status', ['sewa', 'permanen']);
            $table->string('expired')->nullable();
            $table->date('start_at');
            $table->date('end_at');
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->string('status')->default("active");
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
        Schema::dropIfExists('warehouse');
    }
}
