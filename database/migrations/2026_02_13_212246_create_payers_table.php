<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('payers', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('user_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->string('name');
            $table->string('email')->nullable();
            $table->string('docs', 20)->nullable();
            $table->string('gateway_payers_id')->nullable();

            $table->unique(['user_id', 'document']);
            $table->unique(['user_id', 'email']);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payers');
    }
};