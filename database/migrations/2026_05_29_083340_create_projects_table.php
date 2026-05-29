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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('categorie'); // "Développement / SaaS", "UI/UX Design"...
            $table->string('client');
            $table->string('date');
            $table->text('description');
            $table->string('image');
            $table->json('technologies'); // ["Laravel", "TailwindCSS", ...]
            $table->string('lien')->nullable(); // lien du projet, optionnel
            $table->string('filtre')->default('all'); // "dev", "design", "all"
            $table->boolean('actif')->default(true);
            $table->integer('ordre')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
