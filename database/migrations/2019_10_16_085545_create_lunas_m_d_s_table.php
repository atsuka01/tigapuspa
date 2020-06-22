<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLunasMDSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lunas_m_d_s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('no');
            $table->string('nama');
            $table->string('alamat');
            $table->integer('idmd');
            $table->string('kode_produk');
            $table->string('nomor_lunas');
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
        Schema::dropIfExists('lunas_m_d_s');
    }
}
