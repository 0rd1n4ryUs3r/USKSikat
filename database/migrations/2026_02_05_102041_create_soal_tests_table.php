<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('soal_tests', function (Blueprint $table) {
            $table->id();
            $table->text('pertanyaan');
            $table->text('pilihan_a');
            $table->text('pilihan_b');
            $table->text('pilihan_c');
            $table->text('pilihan_d');
            $table->text('pilihan_e')->nullable();
            $table->enum('jawaban_benar', ['a', 'b', 'c', 'd', 'e']);
            $table->enum('kategori', ['matematika', 'bahasa_inggris', 'logika', 'umum']);
            $table->enum('tingkat_kesulitan', ['mudah', 'sedang', 'sulit'])->default('sedang');
            $table->string('gambar')->nullable();
            $table->text('penjelasan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('soal_tests');
    }
};
