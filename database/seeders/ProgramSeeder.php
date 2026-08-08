<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $programs = [
            // SMK
            ['unit' => 'smk', 'type' => 'jurusan', 'icon' => '💻', 'title' => 'Teknik Komputer & Jaringan', 'description' => 'Rekayasa perangkat keras, jaringan komputer, dan keamanan siber.'],
            ['unit' => 'smk', 'type' => 'jurusan', 'icon' => '📱', 'title' => 'Rekayasa Perangkat Lunak', 'description' => 'Pengembangan aplikasi mobile, web, dan sistem informasi.'],
            ['unit' => 'smk', 'type' => 'jurusan', 'icon' => '⚡', 'title' => 'Teknik Instalasi Tenaga Listrik', 'description' => 'Instalasi, pemeliharaan, dan perbaikan sistem kelistrikan.'],
            ['unit' => 'smk', 'type' => 'jurusan', 'icon' => '🔧', 'title' => 'Teknik Kendaraan Ringan', 'description' => 'Perawatan dan perbaikan kendaraan bermotor modern.'],
            ['unit' => 'smk', 'type' => 'jurusan', 'icon' => '🏢', 'title' => 'Akuntansi & Keuangan Lembaga', 'description' => 'Keuangan, akuntansi, perbankan, dan administrasi bisnis.'],
            ['unit' => 'smk', 'type' => 'jurusan', 'icon' => '🎨', 'title' => 'Desain Komunikasi Visual', 'description' => 'Branding, ilustrasi digital, fotografi, dan media kreatif.'],
            
            // SMP
            ['unit' => 'smp', 'type' => 'unggulan', 'icon' => '🔬', 'title' => 'Olimpiade Sains', 'description' => 'Program intensif untuk kompetisi sains, matematika, fisika, biologi tingkat nasional.'],
            ['unit' => 'smp', 'type' => 'unggulan', 'icon' => '🌐', 'title' => 'Kelas Bilingual', 'description' => 'Pembelajaran berbasis bahasa Inggris untuk memperkuat kompetensi global siswa.'],
            ['unit' => 'smp', 'type' => 'unggulan', 'icon' => '🕌', 'title' => 'Tahfidz Qur\'an', 'description' => 'Program menghafal Al-Qur\'an dengan pendampingan ustaz/ustazah bersertifikat.'],
            ['unit' => 'smp', 'type' => 'unggulan', 'icon' => '💻', 'title' => 'Coding & Robotik', 'description' => 'Ekskul wajib pengembangan logika pemrograman dasar dan robotika.'],
        ];

        foreach ($programs as $program) {
            \App\Models\Program::firstOrCreate([
                'unit' => $program['unit'],
                'title' => $program['title'],
            ], $program);
        }
    }
}
