<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayCashDaysTable extends Migration
{
    public function up(): void
    {
        Schema::create('pay_cash_days', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('date');
            $table->smallInteger('sum');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pay_cash_days');
    }
}
