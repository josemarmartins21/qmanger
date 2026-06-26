<?php

use App\Models\Account;
use App\Models\Contact;
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
        Schema::create('account_contact', function (Blueprint $table) {
            $table->id();
            
            $table->foreignIdFor(Account::class);
            $table->foreignIdFor(Contact::class);

            $table->unique(['account_id', 'contact_id']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('account_contact');
    }
};
