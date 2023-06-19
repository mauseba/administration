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
        Schema::create('payments', function (Blueprint $table) {
            $table->string('payment_id')->primary();
            $table->double('amount', 6);
            $table->enum('statup',[1,2]);
            $table->date('date');
            $table->enum('groupe',[1,2]);
            $table->time('hourap')->default('03:00');

            $table->unsignedBigInteger('userb_id');
            $table->foreign('userb_id')->references('id')->on('userbs')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
