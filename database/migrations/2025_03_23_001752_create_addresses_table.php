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
        Schema::create('addresses', function (Blueprint $table) {
            // Columnas básicas
            $table->id(); // ID único de la dirección
            $table->foreignId('user_id')
                  ->constrained('users')
                  ->onDelete('cascade'); // Relación 1:N con usuarios
            $table->string('street'); // Calle
            $table->string('city'); // Ciudad
            $table->string('state'); // Estado/Provincia
            $table->string('postal_code'); // Código postal
            $table->string('country'); // País
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
