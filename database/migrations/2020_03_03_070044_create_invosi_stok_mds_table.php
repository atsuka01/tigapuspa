<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvosiStokMdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invosi_stok_mds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integerr('idmd');
            $table->string('kode_produk');
            $table->string('produk');
            $table->integer('harga');
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
        Schema::dropIfExists('invosi_stok_mds');
    }
}
