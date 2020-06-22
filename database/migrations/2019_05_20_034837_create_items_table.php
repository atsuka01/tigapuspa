<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('orders_id')->unsigned();
            $table->string('product_name')->nullable();
            $table->string('jenis_produk')->nullable();
            $table->integer('qty')->unsigned();
            $table->integer('price')->unsigned();
            $table->integer('dis')->unsigned();
            $table->string('btach')->nullable();
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
        Schema::dropIfExists('items');
    }
}
