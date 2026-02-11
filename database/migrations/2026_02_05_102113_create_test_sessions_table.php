<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('test_sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('token')->unique();
            $table->timestamp('mulai')->nullable();
            $table->timestamp('selesai')->nullable();
            $table->integer('durasi')->default(1800)->comment('Durasi dalam detik (30 menit)');
            $table->enum('status', ['pending', 'ongoing', 'completed', 'expired'])->default('pending');
            $table->integer('jumlah_soal')->default(20);
            $table->integer('nilai')->nullable();
            $table->enum('hasil', ['lulus', 'tidak_lulus'])->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('test_sessions');
    }
};
