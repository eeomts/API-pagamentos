<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('payment_methods', function (Blueprint $table) {
            $table->id();

            $table->foreignId('payers_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->string('gateway_token');
            $table->string('brand', 50)->nullable();
            $table->string('last_four', 4)->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payment_methods');
    }
};