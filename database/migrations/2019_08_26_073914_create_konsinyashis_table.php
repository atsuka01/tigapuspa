<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKonsinyashisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('konsinyashis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_apotik');
            $table->string('kode_produk');
            $table->string('nama_produk');
            $table->string('keterangan');
            $table->integer('qtyin');
            $table->integer('qtyout');
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
        Schema::dropIfExists('konsinyashis');
    }
}
