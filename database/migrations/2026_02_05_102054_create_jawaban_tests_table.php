<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jawaban_tests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('soal_test_id')->constrained()->onDelete('cascade');
            $table->foreignId('test_session_id')->nullable()->constrained()->onDelete('cascade');
            $table->enum('jawaban_user', ['a', 'b', 'c', 'd', 'e']);
            $table->boolean('is_correct')->default(false);
            $table->integer('waktu_jawab')->nullable()->comment('Waktu dalam detik');
            $table->timestamps();

            $table->unique(['user_id', 'soal_test_id', 'test_session_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jawaban_tests');
    }
};
