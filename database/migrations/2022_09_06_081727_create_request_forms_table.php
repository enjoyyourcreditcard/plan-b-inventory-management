<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dbs_request_forms', function (Blueprint $table) {
            $table->id();
            $table->string('grf_code');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('warehouse_id')->unsigned()->nullable();
            $table->foreign('warehouse_id')->references('id')->on('warehouse');
            $table->unsignedBigInteger('part_id')->nullable();
            $table->foreign('part_id')->references('id')->on('parts');
            $table->integer('quantity')->nullable();
            $table->string('remarks')->nullable();
            $table->boolean('warehouse_check')->default(false);
            $table->timestamps();
            $table->enum('status', ['draft', 'submited', 'closed'])->default('draft');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('request_forms');
    }
}
