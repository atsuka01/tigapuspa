<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStokApotiksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stok_apotiks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('no');
            $table->integer('idap');
            $table->string('nama_ap');
            $table->string('tlp_ap');
            $table->string('alamat_ap');
            $table->string('kode_ap');
            $table->string('nomor_suratjalan');
            $table->integer('qty');
            $table->string('product_name');
            $table->string('kode_produk');
            $table->string('jenis_produk');

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
        Schema::dropIfExists('stok_apotiks');
    }
}
