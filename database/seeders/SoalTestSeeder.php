<?php

namespace Database\Seeders;

use App\Models\SoalTest;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SoalTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing data
        DB::table('soal_tests')->truncate();

        $soals = [
            // === MATEMATIKA (5 SOAL) ===
            [
                'pertanyaan' => 'Hasil dari 15 × 8 ÷ 4 + 6 adalah...',
                'pilihan_a' => '36',
                'pilihan_b' => '38',
                'pilihan_c' => '40',
                'pilihan_d' => '42',
                'pilihan_e' => '44',
                'jawaban_benar' => 'a',
                'kategori' => 'matematika',
                'tingkat_kesulitan' => 'mudah',
                'penjelasan' => '15 × 8 = 120, 120 ÷ 4 = 30, 30 + 6 = 36',
            ],
            [
                'pertanyaan' => 'Jika 3x - 7 = 14, maka nilai x adalah...',
                'pilihan_a' => '5',
                'pilihan_b' => '6',
                'pilihan_c' => '7',
                'pilihan_d' => '8',
                'pilihan_e' => '9',
                'jawaban_benar' => 'c',
                'kategori' => 'matematika',
                'tingkat_kesulitan' => 'mudah',
                'penjelasan' => '3x = 14 + 7, 3x = 21, x = 21 ÷ 3 = 7',
            ],
            [
                'pertanyaan' => 'Bentuk sederhana dari 2/3 + 3/4 adalah...',
                'pilihan_a' => '5/7',
                'pilihan_b' => '17/12',
                'pilihan_c' => '5/12',
                'pilihan_d' => '1 5/12',
                'pilihan_e' => '1 1/2',
                'jawaban_benar' => 'b',
                'kategori' => 'matematika',
                'tingkat_kesulitan' => 'sedang',
                'penjelasan' => '2/3 + 3/4 = (8/12) + (9/12) = 17/12',
            ],
            [
                'pertanyaan' => 'Luas persegi dengan panjang sisi 12 cm adalah...',
                'pilihan_a' => '48 cm²',
                'pilihan_b' => '96 cm²',
                'pilihan_c' => '120 cm²',
                'pilihan_d' => '144 cm²',
                'pilihan_e' => '196 cm²',
                'jawaban_benar' => 'd',
                'kategori' => 'matematika',
                'tingkat_kesulitan' => 'mudah',
                'penjelasan' => 'Luas persegi = sisi × sisi = 12 × 12 = 144 cm²',
            ],
            [
                'pertanyaan' => 'Hasil dari √144 + √81 adalah...',
                'pilihan_a' => '15',
                'pilihan_b' => '18',
                'pilihan_c' => '21',
                'pilihan_d' => '23',
                'pilihan_e' => '25',
                'jawaban_benar' => 'c',
                'kategori' => 'matematika',
                'tingkat_kesulitan' => 'mudah',
                'penjelasan' => '√144 = 12, √81 = 9, 12 + 9 = 21',
            ],

            // === BAHASA INGGRIS (5 SOAL) ===
            [
                'pertanyaan' => 'Choose the correct sentence:',
                'pilihan_a' => 'She go to school every day.',
                'pilihan_b' => 'She goes to school every day.',
                'pilihan_c' => 'She going to school every day.',
                'pilihan_d' => 'She gone to school every day.',
                'pilihan_e' => 'She to go school every day.',
                'jawaban_benar' => 'b',
                'kategori' => 'bahasa_inggris',
                'tingkat_kesulitan' => 'mudah',
                'penjelasan' => 'Subject "She" requires verb with -s: goes',
            ],
            [
                'pertanyaan' => 'Antonym of "beautiful" is...',
                'pilihan_a' => 'Pretty',
                'pilihan_b' => 'Handsome',
                'pilihan_c' => 'Ugly',
                'pilihan_d' => 'Nice',
                'pilihan_e' => 'Gorgeous',
                'jawaban_benar' => 'c',
                'kategori' => 'bahasa_inggris',
                'tingkat_kesulitan' => 'mudah',
                'penjelasan' => 'Beautiful means attractive, ugly means unattractive',
            ],
            [
                'pertanyaan' => '"I have been living here ___ 2020." Fill in the blank.',
                'pilihan_a' => 'since',
                'pilihan_b' => 'for',
                'pilihan_c' => 'during',
                'pilihan_d' => 'from',
                'pilihan_e' => 'by',
                'jawaban_benar' => 'a',
                'kategori' => 'bahasa_inggris',
                'tingkat_kesulitan' => 'sedang',
                'penjelasan' => '"Since" is used with specific point in time',
            ],
            [
                'pertanyaan' => '"If I ___ you, I would study harder."',
                'pilihan_a' => 'am',
                'pilihan_b' => 'was',
                'pilihan_c' => 'were',
                'pilihan_d' => 'be',
                'pilihan_e' => 'been',
                'jawaban_benar' => 'c',
                'kategori' => 'bahasa_inggris',
                'tingkat_kesulitan' => 'sedang',
                'penjelasan' => 'In conditional sentences, "were" is used for all subjects',
            ],
            [
                'pertanyaan' => 'The correct plural form of "child" is...',
                'pilihan_a' => 'Childs',
                'pilihan_b' => 'Children',
                'pilihan_c' => 'Childes',
                'pilihan_d' => 'Childen',
                'pilihan_e' => 'Child\'s',
                'jawaban_benar' => 'b',
                'kategori' => 'bahasa_inggris',
                'tingkat_kesulitan' => 'mudah',
                'penjelasan' => 'Irregular plural: child → children',
            ],

            // === LOGIKA (5 SOAL) ===
            [
                'pertanyaan' => 'Jika semua A adalah B, dan semua B adalah C, maka...',
                'pilihan_a' => 'Semua A adalah C',
                'pilihan_b' => 'Semua C adalah A',
                'pilihan_c' => 'Beberapa A adalah C',
                'pilihan_d' => 'Tidak ada A yang adalah C',
                'pilihan_e' => 'Hubungan A dan C tidak dapat ditentukan',
                'jawaban_benar' => 'a',
                'kategori' => 'logika',
                'tingkat_kesulitan' => 'sedang',
                'penjelasan' => 'Transitive property: A ⊆ B ⊆ C → A ⊆ C',
            ],
            [
                'pertanyaan' => '2, 4, 8, 16, ... Angka selanjutnya adalah...',
                'pilihan_a' => '24',
                'pilihan_b' => '28',
                'pilihan_c' => '30',
                'pilihan_d' => '32',
                'pilihan_e' => '36',
                'jawaban_benar' => 'd',
                'kategori' => 'logika',
                'tingkat_kesulitan' => 'mudah',
                'penjelasan' => 'Pola dikali 2: 2×2=4, 4×2=8, 8×2=16, 16×2=32',
            ],
            [
                'pertanyaan' => 'Jika hari ini adalah Senin, maka 100 hari lagi adalah hari...',
                'pilihan_a' => 'Rabu',
                'pilihan_b' => 'Kamis',
                'pilihan_c' => 'Jumat',
                'pilihan_d' => 'Sabtu',
                'pilihan_e' => 'Minggu',
                'jawaban_benar' => 'a',
                'kategori' => 'logika',
                'tingkat_kesulitan' => 'sedang',
                'penjelasan' => '100 ÷ 7 = 14 sisa 2. Senin + 2 hari = Rabu',
            ],
            [
                'pertanyaan' => 'A, C, E, G, ... Huruf selanjutnya adalah...',
                'pilihan_a' => 'H',
                'pilihan_b' => 'I',
                'pilihan_c' => 'J',
                'pilihan_d' => 'K',
                'pilihan_e' => 'L',
                'jawaban_benar' => 'b',
                'kategori' => 'logika',
                'tingkat_kesulitan' => 'mudah',
                'penjelasan' => 'Pola huruf ganjil: A(1), C(3), E(5), G(7), I(9)',
            ],
            [
                'pertanyaan' => 'Jika 5 ekor kucing dapat menangkap 5 ekor tikus dalam 5 menit, berapa ekor kucing yang dibutuhkan untuk menangkap 100 ekor tikus dalam 100 menit?',
                'pilihan_a' => '5',
                'pilihan_b' => '10',
                'pilihan_c' => '20',
                'pilihan_d' => '50',
                'pilihan_e' => '100',
                'jawaban_benar' => 'a',
                'kategori' => 'logika',
                'tingkat_kesulitan' => 'sulit',
                'penjelasan' => '5 kucing = 5 tikus/5 menit = 1 tikus/menit. Untuk 100 tikus dalam 100 menit = 1 tikus/menit = 5 kucing',
            ],

            // === UMUM (5 SOAL) ===
            [
                'pertanyaan' => 'Ibukota Indonesia adalah...',
                'pilihan_a' => 'Jakarta',
                'pilihan_b' => 'Bandung',
                'pilihan_c' => 'Surabaya',
                'pilihan_d' => 'Medan',
                'pilihan_e' => 'Bali',
                'jawaban_benar' => 'a',
                'kategori' => 'umum',
                'tingkat_kesulitan' => 'mudah',
                'penjelasan' => 'Jakarta adalah ibukota negara Indonesia',
            ],
            [
                'pertanyaan' => 'Pancasila sila pertama adalah...',
                'pilihan_a' => 'Kemanusiaan yang adil dan beradab',
                'pilihan_b' => 'Persatuan Indonesia',
                'pilihan_c' => 'Kerakyatan yang dipimpin oleh hikmat kebijaksanaan dalam permusyawaratan/perwakilan',
                'pilihan_d' => 'Ketuhanan Yang Maha Esa',
                'pilihan_e' => 'Keadilan sosial bagi seluruh rakyat Indonesia',
                'jawaban_benar' => 'd',
                'kategori' => 'umum',
                'tingkat_kesulitan' => 'mudah',
                'penjelasan' => 'Sila 1: Ketuhanan Yang Maha Esa',
            ],
            [
                'pertanyaan' => 'Lambang negara Indonesia adalah...',
                'pilihan_a' => 'Garuda Pancasila',
                'pilihan_b' => 'Burung Merak',
                'pilihan_c' => 'Harimau',
                'pilihan_d' => 'Komodo',
                'pilihan_e' => 'Rajawali',
                'jawaban_benar' => 'a',
                'kategori' => 'umum',
                'tingkat_kesulitan' => 'mudah',
                'penjelasan' => 'Garuda Pancasila adalah lambang negara Indonesia',
            ],
            [
                'pertanyaan' => 'Tanggal berapa Indonesia merdeka?',
                'pilihan_a' => '27 Desember 1949',
                'pilihan_b' => '17 Agustus 1945',
                'pilihan_c' => '1 Juni 1945',
                'pilihan_d' => '28 Oktober 1928',
                'pilihan_e' => '10 November 1945',
                'jawaban_benar' => 'b',
                'kategori' => 'umum',
                'tingkat_kesulitan' => 'mudah',
                'penjelasan' => 'Indonesia merdeka pada 17 Agustus 1945',
            ],
            [
                'pertanyaan' => 'Warna bendera Indonesia adalah...',
                'pilihan_a' => 'Merah Putih',
                'pilihan_b' => 'Merah Biru',
                'pilihan_c' => 'Hijau Putih',
                'pilihan_d' => 'Kuning Merah',
                'pilihan_e' => 'Hitam Putih',
                'jawaban_benar' => 'a',
                'kategori' => 'umum',
                'tingkat_kesulitan' => 'mudah',
                'penjelasan' => 'Bendera Indonesia berwarna merah dan putih',
            ],
        ];

        foreach ($soals as $soal) {
            SoalTest::create($soal);
        }

        $this->command->info('✅ 20 soal test PMB berhasil ditambahkan ke database!');
        $this->command->info('📊 Distribusi soal:');
        $this->command->info('   - Matematika: 5 soal');
        $this->command->info('   - Bahasa Inggris: 5 soal');
        $this->command->info('   - Logika: 5 soal');
        $this->command->info('   - Umum: 5 soal');
    }
}
