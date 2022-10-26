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
        Schema::create('warehouse', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('regional', [
                "Jabodetabek",
                "Jakarta",
                "Surabaya",
                "Medan",
                "Bandung",
                "Semarang",
                "Malang",
                "SUMATERA 1",
                "SUMATERA 2",
                "JAWA TENGAH",
                "KALIMANTAN",
                "JATIM, BALI & NT",
                "SULAMPA",
                "Others"
            ]);
            $table->string('city');
            $table->string('location');
            $table->string('type');
            $table->enum('contract_status', ['Contract', 'Permanent']);
            $table->string('expired')->nullable();
            $table->date('start_at');
            $table->date('end_at');
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->enum('status', ['active', 'inactive'])->default("active");
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
