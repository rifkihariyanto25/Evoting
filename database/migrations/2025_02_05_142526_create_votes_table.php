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
        Schema::create('votes', function (Blueprint $table) {

            $table->id();
            // akan menyimpan voternya siapa
            $table->unsignedBigInteger('voter_id');
            $table->foreign('voter_id')->references('id')->on('voters')->onDelete('cascade');

            // dan kadidat yg dipilih itu siapa dan menghitung dapet berapa voting
            $table->unsignedBigInteger('candidate_id');
            $table->foreign('candidate_id')->references('id')->on('candidates')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('votes');
    }
};
