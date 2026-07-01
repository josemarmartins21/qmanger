<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('signatures', function (Blueprint $table) {
            $table->id();

            $table->foreignId('account_id')
            ->constrained('accounts')
            ->cascadeOnDelete()
            ->cascadeOnUpdate();
            $table->foreignId('plan_id')
            ->constrained('plans')
            ->restrictOnDelete()
            ->restrictOnUpdate();
            $table->foreignId('user_id')
            ->nullable()
            ->constrained('users')
            ->nullOnDelete()
            ->nullOnUpdate();

            $table->decimal('price', 10);   
            $table->date('start_date');
            $table->date('end_date');
            $table->boolean('status')->default(0);
            $table->decimal('discount')->default(0);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('signatures');
    }
};
