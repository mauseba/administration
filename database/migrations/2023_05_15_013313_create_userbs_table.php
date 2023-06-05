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
        Schema::create('userbs', function (Blueprint $table) {
            $table->id();
            $table->string('Nom');
            $table->string('Prenom');
            $table->string('Ville');
            $table->string('Province');
            $table->string('CodePostal');
            $table->string('Telephone');
            $table->string('Courriel');
            $table->string('Adresse');
            $table->string('Langue');
            $table->string('EtatMatrimonial');
            $table->string('StatutCanada');
            $table->date('DateNaiss');
            $table->string('Pays');
            $table->enum('Genre',['M','F','O']);
            $table->string('Menage');
            $table->enum('status',[1,2])->default(1);
            $table->bigInteger('Revenu');
            $table->string('Type_logement');
            $table->Enum('Q1',['OUI','NO']);
            $table->Enum('Q2',['OUI','NO']);
            $table->Enum('Q3',['OUI','NO']);
            $table->Enum('Q4',['OUI','NO']);
            $table->Enum('Q5',['OUI','NO']);

            $table->unsignedBigInteger('userl_id')->nullable();
            $table->foreign('userl_id')->references('id')->on('users')->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('userbs');
    }
};
