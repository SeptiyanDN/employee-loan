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
        Schema::create('bukti_pembayaran_loans', function (Blueprint $table) {
            $table->id();
            $table->string('name_employee');
            $table->bigInteger('mountly_installment');
            $table->string('image');
            $table->foreignId('loan_application_id')->references('id')->on('loan_applications');
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
        Schema::dropIfExists('bukti_pembayaran_loans');
    }
};
