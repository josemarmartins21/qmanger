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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 35);
            $table->string('last_name', 35);
            $table->string('phone', 20);
            $table->string('email', 60)->unique()->nullable();

            $table->foreignId('user_id')
            ->nullable()
            ->constrained('users')
            ->nullOnDelete()
            ->nullOnUpdate();
            $table->foreignId('endereco_id')
            ->constrained('enderecos')
            ->restrictOnDelete()
            ->restrictOnUpdate();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
