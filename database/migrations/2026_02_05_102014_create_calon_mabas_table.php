<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('calon_maba', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('nomor_test')->unique()->nullable();
            $table->string('nim')->nullable();
            $table->enum('status_test', ['belum', 'lulus', 'tidak_lulus'])->default('belum');
            $table->integer('nilai_test')->nullable();
            $table->enum('status_daftar_ulang', ['belum', 'proses', 'lengkap'])->default('belum');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('calon_maba');
    }
};
