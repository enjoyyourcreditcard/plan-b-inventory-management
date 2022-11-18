<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInboundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inbounds', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('part_id')->unsigned();
            $table->foreign('part_id')->references('id')->on('parts');
            $table->string('orafin_code')->nullable();
            $table->string('sn_code')->nullable()->unique();
            $table->string('condition')->default('good new');
            $table->string('stock_status')->default('in');
            $table->string('status')->default('active');
            // $table->boolean('is_select')->default(0);
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
        Schema::dropIfExists('inbounds');
    }
}
