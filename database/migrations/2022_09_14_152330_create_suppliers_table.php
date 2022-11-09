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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('nama_supplier');
            $table->string('telepon');
            $table->string('email');
            $table->string('alamat');
            $table->string('kelurahan');
            $table->string('kode_pos');
            $table->string('nama_perwakilan');
            $table->string('telepon_perwakilan');
            $table->string('email_perwakilan');
            $table->foreignId('tenant_id')->nullable()->references('id')->on('tenants');
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
        Schema::dropIfExists('suppliers');
    }
};
