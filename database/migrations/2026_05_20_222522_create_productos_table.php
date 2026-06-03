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
     schema::create('productos', function (Blueprint $table) {
            $table->id();                                         // ID Autoincremental [cite: 61]
            $table->string('nombre', 150);                    // Nombre del producto (máx 150 caracteres) [cite: 62]
            $table->text('descripcion')->nullable();          // Descripción opcional [cite: 63]
            $table->decimal('precio', 10, 2);                 // Precio con dos decimales [cite: 64]
            $table->integer('stock')->default(0);             // Stock inicial en 0 [cite: 65]
            $table->string('url_imagen')->nullable();         // Link de la imagen (opcional) [cite: 66]
            $table->boolean('activo')->default(true);         // Estado del producto [cite: 67]
            $table->timestamps();

     });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
