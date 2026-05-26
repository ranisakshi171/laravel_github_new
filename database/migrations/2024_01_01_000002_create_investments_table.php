<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('investments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('stock_id')->nullable()->constrained()->onDelete('set null');
            $table->enum('type', ['stock', 'mutual_fund', 'sip', 'fd'])->default('stock');
            $table->decimal('amount', 14, 2);
            $table->decimal('units', 12, 4)->default(0);
            $table->decimal('purchase_price', 12, 2)->default(0);
            $table->decimal('current_value', 14, 2)->nullable();
            $table->decimal('returns', 12, 2)->default(0);
            $table->enum('status', ['active', 'closed', 'pending'])->default('active');
            $table->string('fund_name')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('investments');
    }
};
