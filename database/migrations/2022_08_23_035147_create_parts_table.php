<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->string('im_code')->nullable();
            $table->string('inventory_code')->nullable();
            $table->string('orafin_code')->nullable();
            $table->string('name');
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->enum('uom', ['meter', 'set', 'each', 'roll', 'unit', 'batang', 'liter', 'kaleng', 'kg', 'kubic', 'pack']);
            $table->enum('sn_status', ['sn', 'non sn']);
            $table->string('color');
            $table->integer('size');
            $table->text('description');
            $table->text('note')->nullable();
            $table->string('img')->nullable();
            $table->string('status')->default('active');
            $table->timestamps();
            $table->string('ended')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parts');
    }
}
