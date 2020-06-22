<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoisAgensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invois_agens', function (Blueprint $table) {
            
            $table->bigIncrements('id');
            $table->integer('idag');
            $table->string('kode_ag');
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
        Schema::dropIfExists('invois_agens');
    }
}
