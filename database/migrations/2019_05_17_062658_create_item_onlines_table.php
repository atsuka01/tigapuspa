<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemOnlinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_onlines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('orders_id')->unsigned();
            $table->string('produk')->nullable();
            $table->string('jenis_produk')->nullable();
            $table->integer('qty')->nullable();
            $table->integer('price')->nullable();
            $table->integer('dis')->nullable();
            $table->integer('amount')->nullable();
            $table->integer('batch')->nullable();
            
            $table->timestamps();
            $table->foreign('orders_id')->references('id')->on('order_onlines');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_onlines');
    }
}
