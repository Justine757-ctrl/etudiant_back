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
    Schema::create('students', function (Blueprint $table) {
        $table->id();
        $table->string('matricule')->unique();
        $table->string('nom');
        $table->string('prenom');
        $table->string('sexe');
        $table->date('date_naissance');
        $table->string('telephone');
        $table->string('adresse');

        // Clé étrangère vers classes
        $table->foreignId('class_id')->constrained('classes')->onDelete('cascade');

        $table->softDeletes(); // Pour la suppression douce !
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
