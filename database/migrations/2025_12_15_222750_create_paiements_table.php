<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('paiements', function (Blueprint $table) {
            $table->id();
            // Clé étrangère vers la table 'pelerins'
            $table->foreignId('pelerin_id')->constrained('pelerins')->onDelete('cascade');
            $table->foreignId('valide_par_agent_id')->constrained('users')->onDelete('restrict');

            $table->decimal('montant', 10, 2);
            $table->string('mode_paiement'); 
            $table->string('reference_recu')->nullable()->unique(); 

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('paiements');
    }
};

