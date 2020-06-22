<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoisApotiksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invois_apotiks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('idap');
            $table->string('kode_ap');
            $table->string('nomorinvois');
            $table->string('kode_produk');
            $table->string('product_name');
            $table->integer('no');
            $table->integer('harga');
            $table->string('jenis_produk');
            $table->integer('qtyin');
            $table->integer('diskon');
            $table->integer('jumlah');
            $table->integer('total');
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
        Schema::dropIfExists('invois_apotiks');
    }
}
