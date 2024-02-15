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
       /* Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->text('content');
            $table->string('category');
            $table->string('image')->nullable();

        });*/
        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->id();
            $table->morphs('tokenable');
            $table->string('name', 255);
            $table->string('token', 191)->unique();
            $table->timestamps();
        
            // Ajouter un index sur les colonnes tokenable_type et tokenable_id avec une longueur spécifiée
            $table->index(['tokenable_type', 'tokenable_id'], 'personal_access_tokens_type_id_index', '191');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
