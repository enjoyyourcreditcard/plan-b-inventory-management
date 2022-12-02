<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->enum('role', ['admin', 'inventory_control','requester','warehouse']);
            $table->enum('regional', [
                "Jakarta 1",
                "Jakarta 2",
                "Jakarta 3",
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
            $table->unsignedBigInteger('warehouse_id');
            $table->foreign('warehouse_id')->references('id')->on('warehouse');
            $table->unsignedBigInteger('vendor_id')->nullable();
            $table->foreign('vendor_id')->references('id')->on('vendors');
            $table->string('nik')->nullable();
            $table->string('no_telp');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('pin')->length(4);
            $table->string('status')->default("active");
            $table->boolean('is_vendor')->default(false);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}