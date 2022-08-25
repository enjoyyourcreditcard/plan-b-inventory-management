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
            // $table->foreign('category_id')->references('id')->on('category');
            $table->string('category_id');
            $table->string('name');
            $table->text('description');
            $table->text('note');
            $table->string('img')->nullable();
            $table->string('started')->nullable();
            $table->string('updated')->nullable();
            $table->string('ended')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('parts');
    }
}
