<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Models\Content;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Default theme
        Setting::set('active_theme', 'aurora');
        Setting::set('site_name', 'Tinta Emas Indonesia');
        Setting::set('yayasan_name', 'Yayasan Tinta Emas Indonesia');
        Setting::set('address', 'Jl. Pendidikan No. 1, Indonesia');
        Setting::set('phone', '+62 XXX XXXX XXXX');
        Setting::set('email', 'info@tintaemasindonesia.sch.id');
        Setting::set('instagram', 'https://instagram.com/tintaemas');
        Setting::set('facebook', 'https://facebook.com/tintaemas');
        Setting::set('youtube', 'https://youtube.com/@tintaemas');
        Setting::set('tiktok', 'https://tiktok.com/@tintaemas');
        Setting::set('whatsapp', 'https://wa.me/62XXXXXXXXXXX');
        Setting::set('twitter', 'https://twitter.com/tintaemas');

        // Home contents
        $homeContents = [
            ['home', 'hero', 'tagline', 'Mencetak Generasi Emas Bangsa'],
            ['home', 'hero', 'subtitle', 'Yayasan Tinta Emas Indonesia berkomitmen menghadirkan pendidikan berkualitas, inovatif, dan berdaya saing global.'],
            ['home', 'about', 'title', 'Tentang Yayasan Tinta Emas Indonesia'],
            ['home', 'about', 'body', 'Yayasan Tinta Emas Indonesia adalah lembaga pendidikan swasta yang berdedikasi tinggi dalam membentuk karakter dan kompetensi generasi muda Indonesia. Berdiri dengan semangat mencerdaskan kehidupan bangsa, kami hadir dengan dua unit pendidikan unggulan: SMP dan SMK Tinta Emas Indonesia, serta layanan SPMB dan BKK yang terintegrasi.'],
            ['home', 'vision', 'text', 'Menjadi lembaga pendidikan terkemuka yang melahirkan generasi berakhlak mulia, berprestasi, berjiwa wirausaha, dan mampu bersaing di era global.'],
            ['home', 'mission', 'text', "1. Menyelenggarakan pendidikan bermutu tinggi berbasis teknologi dan karakter.\n2. Mengembangkan potensi peserta didik secara holistik dan berkelanjutan.\n3. Membangun kemitraan strategis dengan dunia industri dan usaha.\n4. Menciptakan lingkungan belajar yang inovatif, inklusif, dan inspiratif.\n5. Mencetak lulusan yang siap kerja, mandiri, dan berdedikasi kepada masyarakat."],
            // SMK
            ['smk', 'hero', 'tagline', 'SMK Tinta Emas Indonesia'],
            ['smk', 'hero', 'subtitle', 'Sekolah Menengah Kejuruan unggulan dengan program keahlian berbasis industri dan teknologi terkini.'],
            ['smk', 'about', 'title', 'Tentang SMK Tinta Emas Indonesia'],
            ['smk', 'about', 'body', 'SMK Tinta Emas Indonesia adalah sekolah kejuruan yang berfokus pada pengembangan kompetensi teknis dan profesional. Dengan kurikulum yang selaras dengan kebutuhan industri, kami mempersiapkan lulusan yang siap kerja dan berdaya saing tinggi.'],
            ['smk', 'vision', 'text', 'Menjadi SMK unggul yang menghasilkan lulusan kompeten, berkarakter, dan siap bersaing di dunia kerja maupun wirausaha.'],
            ['smk', 'mission', 'text', "1. Menyelenggarakan pendidikan kejuruan berbasis kompetensi industri.\n2. Mengembangkan program teaching factory dan kewirausahaan.\n3. Membangun kemitraan industri yang kuat untuk praktik kerja industri.\n4. Membina karakter dan soft skill peserta didik secara berkesinambungan."],
            ['smk', 'akreditasi', 'value', 'A (Unggul)'],
            // SMP
            ['smp', 'hero', 'tagline', 'SMP Tinta Emas Indonesia'],
            ['smp', 'hero', 'subtitle', 'Sekolah Menengah Pertama yang membentuk karakter kuat, akademik hebat, dan potensi tak terbatas.'],
            ['smp', 'about', 'title', 'Tentang SMP Tinta Emas Indonesia'],
            ['smp', 'about', 'body', 'SMP Tinta Emas Indonesia hadir sebagai jembatan pendidikan yang kokoh dari jenjang dasar menuju sekolah menengah atas atau kejuruan. Kami mengedepankan pendidikan holistik yang mengintegrasikan kecerdasan intelektual, emosional, dan spiritual.'],
            ['smp', 'vision', 'text', 'Menjadi SMP terbaik yang melahirkan siswa berakhlak mulia, cerdas, kreatif, dan berwawasan luas.'],
            ['smp', 'mission', 'text', "1. Mengembangkan potensi akademik dan non-akademik setiap siswa.\n2. Menanamkan nilai karakter, disiplin, dan budaya berprestasi.\n3. Menciptakan lingkungan belajar yang aman, nyaman, dan menyenangkan.\n4. Mempersiapkan siswa untuk melanjutkan ke jenjang pendidikan lebih tinggi."],
            ['smp', 'akreditasi', 'value', 'A (Unggul)'],
            // SPMB
            ['spmb', 'hero', 'tagline', 'SPMB Tinta Emas Indonesia'],
            ['spmb', 'hero', 'subtitle', 'Sistem Penerimaan Murid Baru yang transparan, mudah, dan terpercaya untuk tahun ajaran baru.'],
            ['spmb', 'info', 'year', '2025/2026'],
            ['spmb', 'info', 'open_date', '1 Juli 2025'],
            ['spmb', 'info', 'close_date', '31 Agustus 2025'],
            ['spmb', 'info', 'announcement', '5 September 2025'],
            ['spmb', 'info', 'register_date', '8–12 September 2025'],
            // BKK
            ['bkk', 'hero', 'tagline', 'BKK Tinta Emas Indonesia'],
            ['bkk', 'hero', 'subtitle', 'Bursa Kerja Khusus yang menghubungkan lulusan terbaik dengan perusahaan mitra terpercaya.'],
            ['bkk', 'about', 'title', 'Tentang BKK Tinta Emas Indonesia'],
            ['bkk', 'about', 'body', 'BKK (Bursa Kerja Khusus) Tinta Emas Indonesia adalah unit layanan ketenagakerjaan yang bertugas menyalurkan lulusan SMK ke dunia kerja. Kami bermitra dengan ratusan perusahaan nasional dan multinasional untuk memberikan peluang karir terbaik bagi lulusan kami.'],
        ];

        foreach ($homeContents as [$unit, $section, $key, $value]) {
            Content::updateOrCreate(
                ['unit' => $unit, 'section' => $section, 'key' => $key],
                ['value' => $value]
            );
        }
    }
}
