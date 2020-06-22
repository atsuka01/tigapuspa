<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataRetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_retails', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_retail');
            $table->string('notlp');
            $table->string('alamat'); 
            $table->string('nomor_invois');
            $table->string('subtotal');
            $table->integer('no');
            $table->string('kode_produk');
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
        Schema::dropIfExists('data_retails');
    }
}
