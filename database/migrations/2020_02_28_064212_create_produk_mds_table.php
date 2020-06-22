<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdukMdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk_mds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_md');
            $table->string('produk');
            $table->string('kode_produk');
            $table->integer('qtyin');
            $table->integer('diskon');
            $table->integer('jumlah');
            $table->integer('total');
            $table->integer('harga');
            $table->integer('grandtotal');
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
        Schema::dropIfExists('produk_mds');
    }
}
