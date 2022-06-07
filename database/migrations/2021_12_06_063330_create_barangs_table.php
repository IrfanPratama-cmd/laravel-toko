<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_id');
            $table->string('nama_barang');
            $table->integer('harga');
            $table->integer('stok');
            $table->string('gambar_barang')->nullable();
            $table->enum('status', ['0', '1', '2'])->nullable(); //0 -> Biasa, 1 -> Recommended, 2 -> Favorit
            $table->text('keterangan');
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
        Schema::dropIfExists('barangs');
    }
}
