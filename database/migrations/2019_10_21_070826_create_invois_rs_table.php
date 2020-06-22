<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoisRsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invois_rs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('idrs');
            $table->string('kode_rs');
            $table->string('nomorinvois');
            $table->string('kode_produk');
            $table->string('product_name');
            $table->integer('no');
            $table->string('harga');
            $table->string('jenis_produk');
            $table->integer('qtyin');
            $table->integer('diskon');
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
        Schema::dropIfExists('invois_rs');
    }
}
