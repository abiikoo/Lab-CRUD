<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');          // Nombre del producto
            $table->string('description');   // Descripción del producto
            $table->double('price', 8, 2);   // Precio
            $table->integer('stock');        // Cantidad disponible
            
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
