<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserProfileSeeder extends Seeder
{
    public function run(): void
    {
        // Update admin user dengan data lengkap
        $admin = User::where('email', 'admin@pmb.test')->first();
        if ($admin) {
            $admin->update([
                'phone' => '081234567890',
                'address' => 'Jl. Admin No. 1, Jakarta',
                'position' => 'Super Admin',
                'department' => 'PMB Office',
                'birth_place' => 'Jakarta',
                'birth_date' => '1990-01-01',
                'gender' => 'L',
            ]);
        }

        // Buat user calon maba contoh
        User::create([
            'name' => 'Budi Santoso',
            'email' => 'budi@example.com',
            'password' => Hash::make('password123'),
            'role' => 'user',
            'phone' => '081298765432',
            'address' => 'Jl. Contoh No. 123, Bandung',
            'birth_place' => 'Bandung',
            'birth_date' => '2005-05-15',
            'gender' => 'L',
            'father_name' => 'Ahmad Santoso',
            'mother_name' => 'Siti Rahayu',
        ]);
    }
}
