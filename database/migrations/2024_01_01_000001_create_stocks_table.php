<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->string('symbol', 10)->unique();
            $table->string('company_name');
            $table->string('sector')->nullable();
            $table->decimal('price', 12, 2);
            $table->decimal('previous_price', 12, 2)->nullable();
            $table->decimal('change_percentage', 6, 2)->default(0);
            $table->decimal('market_cap', 20, 2)->nullable();
            $table->bigInteger('volume')->nullable();
            $table->string('logo')->nullable();
            $table->boolean('is_trending')->default(false);
            $table->boolean('is_top_gainer')->default(false);
            $table->boolean('is_top_loser')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
