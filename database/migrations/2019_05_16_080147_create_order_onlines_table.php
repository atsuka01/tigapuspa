<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderOnlinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_onlines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_pelanggan');
            $table->string('nohandpone_pelanggan');
            $table->string('alamat_pelanggan');
            $table->string('kota_pelanggan');
            $table->string('bukti_pembayaran');
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
        Schema::dropIfExists('order_onlines');
    }
}
