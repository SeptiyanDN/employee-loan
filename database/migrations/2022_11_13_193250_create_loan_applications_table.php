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
        Schema::create('loan_applications', function (Blueprint $table) {
            $table->id();
            $table->string('number_application');
            $table->foreignId('employee_id')->references('id')->on('employees');
            $table->foreignId('typeLoan_id')->references('id')->on('type_loans');
            $table->integer('period')->default(1);
            $table->float('charge_fee')->default(0);
            $table->float('bunga')->default(0);
            $table->bigInteger('loan_ammount');
            $table->string('description');
            $table->foreignId('status_id')->references('id')->on('statuses');
            $table->integer('remaining_payment');
            $table->bigInteger('mountly_installment');
            $table->date('due_date');
            $table->string('status_due_date');
            $table->boolean('overdue')->default(false);
            $table->integer('created_by_id');
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
        Schema::dropIfExists('loan_applications');
    }
};
