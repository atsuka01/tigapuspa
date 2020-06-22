<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksiReselersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_reselers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('no');
            $table->string('kode_produk');
            $table->string('kodem_md');
            $table->string('kode_rs');
            $table->string('nama_customer');
            $table->string('alamat_customer');
            $table->string('notlp_customer');
            $table->string('kota_customer');
            $table->integer('subtotal');
            $table->string('nomor_invoice');
            $table->integer('user_id');
            $table->string('pembayaran');
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
        Schema::dropIfExists('transaksi_reselers');
    }
}
