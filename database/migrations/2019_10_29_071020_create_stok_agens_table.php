<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStokAgensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stok_agens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('no');
            $table->integer('idag');
            $table->string('nama_ag');
            $table->string('tlp_ag');
            $table->string('alamat_ag');
            $table->string('kode_ag');
            $table->string('nomor_suratjalan');
            $table->integer('qty');
            $table->string('product_name');
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
        Schema::dropIfExists('stok_agens');
    }
}
