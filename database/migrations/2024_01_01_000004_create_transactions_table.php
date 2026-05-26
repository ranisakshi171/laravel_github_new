<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('stock_id')->nullable()->constrained()->onDelete('set null');
            $table->enum('type', ['buy', 'sell']);
            $table->integer('quantity');
            $table->decimal('price_per_unit', 12, 2);
            $table->decimal('total_amount', 14, 2);
            $table->decimal('brokerage', 12, 2)->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
