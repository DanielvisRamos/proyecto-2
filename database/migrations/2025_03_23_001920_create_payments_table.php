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
        Schema::create('payments', function (Blueprint $table) {
            // Columnas básicas
            $table->id(); // ID único del pago
            $table->foreignId('reservation_id')
                  ->constrained('reservations')
                  ->unique(); // Relación 1:1 con reservas
            $table->decimal('amount', 10, 2); // Monto del pago
            $table->string('reference_number'); // Número de referencia
            $table->enum('status', ['pending', 'completed', 'refunded'])->default('pending'); // Estado del pago
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
