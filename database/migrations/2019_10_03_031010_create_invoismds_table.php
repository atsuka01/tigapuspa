<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoismdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoismds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('idmd');
            $table->string('nomorinvois');
            $table->string('kode_produk');
            $table->string('produk');
            $table->integer('no');
            $table->string('harga');
            $table->string('jenis_produk');
            $table->integer('qtyin');
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
        Schema::dropIfExists('invoismds');
    }
}
