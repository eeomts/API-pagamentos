<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('payment_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->string('gateway_transaction_id')->nullable()->index();
            $table->string('type', 50); 
            $table->string('status', 50);
            $table->decimal('amount', 10, 2);

            $table->json('raw_response')->nullable(); 
            $table->timestamps();

            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
