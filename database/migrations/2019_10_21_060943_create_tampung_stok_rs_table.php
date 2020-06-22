<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTampungStokRsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tampung_stok_rs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('idrs');
            $table->string('kodeproduk');
            $table->string('product_name');
            $table->string('jenis_produk');
            $table->integer('jumlah_stok');
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
        Schema::dropIfExists('tampung_stok_rs');
    }
}
