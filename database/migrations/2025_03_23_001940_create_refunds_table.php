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
        Schema::create('refunds', function (Blueprint $table) {
            // Columnas básicas
            $table->id(); // ID único del reembolso
            $table->foreignId('reservations_id')
                  ->constrained('reservations')
                  ->unique(); // Relación 1:1 con pagos
            $table->decimal('amount', 10, 2); // Monto reembolsado
            $table->text('reason'); // Razón del reembolso
            $table->enum('status', ['pending', 'completed'])->default('pending'); // Estado del reembolso
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('refunds');
    }
};
