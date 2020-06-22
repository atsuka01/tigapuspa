<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStokReselersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stok_reselers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('no');
            $table->integer('idmd');
            $table->string('nama');
            $table->string('alamat');
            $table->string('kode_produk');
            $table->string('nomor_suratjalan');
            $table->string('kode_md');
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
        Schema::dropIfExists('stok_reselers');
    }
}
