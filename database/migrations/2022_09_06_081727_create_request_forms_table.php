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
            $table->bigInteger('warehouse_id')->unsigned(); 
            $table->foreign('warehouse_id')->references('id')->on('warehouse'); 
            $table->unsignedBigInteger('part_id'); 
            $table->foreign('part_id')->references('id')->on('parts'); 
            $table->integer('quantity'); 
            $table->string('remarks'); 
            $table->boolean('warehouse_check')->default(false);
            $table->string('sn_code')->nullable();
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
        //
    }
}
