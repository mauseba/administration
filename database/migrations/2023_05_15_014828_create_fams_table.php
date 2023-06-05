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
        Schema::create('fams', function (Blueprint $table) {
            $table->id();
            $table->string('NomCom');
            $table->string('LienP');
            $table->enum('Sex',['M','F','O']);
            $table->integer('Age');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('userbs')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fams');
    }
};
