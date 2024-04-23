<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFunFactsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fun_facts', function (Blueprint $table) {
            $table->id();
            $table->string('text'); // Ajoutez la colonne pour le texte du fun fact
            $table->string('author'); // Ajoutez la colonne pour l'auteur du fun fact
            $table->date('date'); // Ajoutez la colonne pour la date de création du fun fact
            $table->string('moderation_status')->default('pending'); // Ajoutez la colonne pour l'état de modération, avec une valeur par défaut de 'pending'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fun_facts');
    }
}

