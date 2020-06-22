<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksiOnlinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_onlines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('produk');
            $table->string('jenis_produk');
            $table->integer('qty');
            $table->integer('price');
            $table->integer('dis');
            $table->integer('amount');
            $table->integer('batch');
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
        Schema::dropIfExists('transaksi_onlines');
    }
}
