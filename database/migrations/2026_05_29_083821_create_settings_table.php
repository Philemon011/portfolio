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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();

            // Infos générales
            $table->string('nom')->default('Philémon');
            $table->string('metier')->default('Développeur Fullstack');
            $table->string('email')->default('etoundelight1@gmail.com');
            $table->string('telephone')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('github')->nullable();
            $table->string('linkedin')->nullable();

            // Section Hero
            $table->text('hero_titre');
            $table->text('hero_sous_titre');
            $table->string('avatar_light')->nullable(); // image mode clair
            $table->string('avatar_dark')->nullable();  // image mode sombre

            // Section À propos
            $table->text('apropos_lead');
            $table->text('apropos_description');
            $table->integer('annees_experience')->default(5);
            $table->integer('projets_livres')->default(20);
            $table->integer('taux_satisfaction')->default(98);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
