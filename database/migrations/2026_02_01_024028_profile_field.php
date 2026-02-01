<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Untuk User (Calon Maba)
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->string('photo')->nullable();
            $table->string('birth_place')->nullable();
            $table->date('birth_date')->nullable();
            $table->enum('gender', ['L', 'P'])->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();

            // Untuk Admin
            $table->string('position')->nullable();
            $table->string('department')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'phone', 'address', 'photo', 'birth_place', 'birth_date',
                'gender', 'father_name', 'mother_name', 'position', 'department',
            ]);
        });
    }
};
