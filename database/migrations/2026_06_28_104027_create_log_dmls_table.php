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
        Schema::create('log_dmls', function (Blueprint $table) {
            $table->id();
            $table->enum('operation', ['INSERT', 'UPDATE', 'DELETE']);
            $table->string('table');

            $table->json('old_data');
            $table->json('new_data');

            $table->string('user_name');

            $table->foreignId('user_id')
            ->nullable()
            ->constrained('users')
            ->nullOnDelete()->nullOnUpdate();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_dmls');
    }
};
