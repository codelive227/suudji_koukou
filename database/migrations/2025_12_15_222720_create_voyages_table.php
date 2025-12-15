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
        Schema::create('voyages', function (Blueprint $table) {
            $table->id();
            $table->string('nom_voyage');
            $table->date('date_depart');
            $table->date('date_retour');
            $table->decimal('prix_total', 10, 2);
            $table->integer('places_totales');
            $table->integer('places_restantes');
            $table->enum('type_voyage', ['Oumra', 'Hajj']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voyages');
    }
};
