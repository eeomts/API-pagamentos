<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('clients_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->foreignId('payers_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->string('gateway_payment_id')->nullable();

            $table->decimal('amount', 10, 2);
            $table->string('currency', 10)->default('BRL');
            $table->string('status', 50)->default('pending');
            $table->string('payment_method', 50)->nullable();
            $table->text('description')->nullable();

            $table->dateTime('paid_at')->nullable();

            $table->timestamps();

            $table->index('status');
            $table->index('gateway_payment_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};