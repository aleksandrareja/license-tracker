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
        Schema::create('licenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade'); // powiązanie z produktem
            $table->string('key')->unique();       // unikalny klucz/licencja
            $table->date('expiration_date')->nullable(); // data wygaśnięcia
            $table->enum('status', ['active', 'expired', 'suspended'])->default('active'); // status
            $table->decimal('price', 10, 2)->default(0); // cena licencji
            $table->timestamps();  // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('licenses');
    }
};
