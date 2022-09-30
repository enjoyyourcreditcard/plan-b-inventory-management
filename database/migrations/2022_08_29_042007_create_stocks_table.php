<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('part_id')->unsigned();
            $table->foreign('part_id')->references('id')->on('parts');
            $table->bigInteger('warehouse_id')->unsigned();
            $table->foreign('warehouse_id')->references('id')->on('warehouse');
            $table->string('sn_code')->nullable();
            $table->enum('condition', ['good new', 'good rekondisi', 'good potongan', 'not good', 'karantina', 'reject', 'scrap', 'dismantle']);
            $table->date('expired_date');
            $table->string('stock_status')->default('in');
            $table->string('status');
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
        Schema::dropIfExists('stocks');
    }
}
