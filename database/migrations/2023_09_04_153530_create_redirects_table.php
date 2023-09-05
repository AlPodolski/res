<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRedirectsTable extends Migration
{
    public function up(): void
    {
        Schema::create('redirects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('from');
            $table->string('to');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('redirects');
    }
}
