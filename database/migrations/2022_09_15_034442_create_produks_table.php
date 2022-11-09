<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('nama_produk');
            $table->foreignId('kategori_id')->nullable()->references('id')->on('kategoris');
            $table->foreignId('merek_id')->nullable()->references('id')->on('mereks');
            $table->string('harga_jual');
            $table->string('harga_modal');
            $table->tinyInteger('diskon')->default(0);
            $table->string('sku');
            $table->string('satuan');
            $table->string('stok');
            $table->string('minimum_stok');
            $table->string('favorit')->default("tidak");
            $table->string('notifikasi_stok_minimum')->default("off");
            $table->foreignId('tenant_id')->references('id')->on('tenants');
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
        Schema::dropIfExists('produks');
    }
};
