<?php

namespace Database\Seeders;

use App\Models\Achievement;
use App\Models\Agenda;
use App\Models\Announcement;
use App\Models\Author;
use App\Models\Gallery;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\NewsTag;
use App\Models\Organization;
use App\Models\Program;
use App\Models\Registration;
use App\Models\Setting;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DemoSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('admin123'),
            ]
        );

        Setting::updateOrCreate(
            ['id' => 1],
            [
                'site_name' => 'Pondok Pesantren Assaidiyyah',
                'tagline' => 'Membentuk Generasi Qurani, Berakhlak Mulia dan Berprestasi',
                'email' => 'info@assaidiyyah.sch.id',
                'phone' => '081234567890',
                'address' => 'Jl. Pesantren Assaidiyyah, Indonesia',
                'description' => 'Pondok Pesantren Assaidiyyah adalah lembaga pendidikan Islam yang berfokus pada pembinaan Al-Qur’an, akhlak, ilmu agama, kemandirian, dan prestasi santri.',
                'vision' => 'Menjadi pesantren unggulan dalam mencetak generasi Qurani, berakhlak mulia, berilmu, dan bermanfaat bagi umat.',
                'mission' => "Menyelenggarakan pendidikan Islam terpadu.\nMembina akhlak dan kedisiplinan santri.\nMengembangkan potensi akademik dan non-akademik.\nMenanamkan jiwa mandiri dan kepemimpinan.",
                'hero_image' => 'https://images.unsplash.com/photo-1564769625905-50e93615e769?q=80&w=1600',
                'meta_title' => 'Pondok Pesantren Assaidiyyah',
                'meta_description' => 'Website resmi Pondok Pesantren Assaidiyyah.',
                'meta_keywords' => 'pondok pesantren, assaidiyyah, tahfidz, santri, ppdb',
                'og_image' => 'https://images.unsplash.com/photo-1564769625905-50e93615e769?q=80&w=1600',
            ]
        );

        $categories = collect(['Kegiatan Pondok', 'Prestasi', 'Kajian', 'PPDB', 'Santri'])->mapWithKeys(function ($name) {
            return [
                $name => NewsCategory::updateOrCreate(
                    ['slug' => Str::slug($name)],
                    [
                        'name' => $name,
                        'color' => '#2563EB',
                       
                    ]
                )
            ];
        });

        $tags = collect(['Tahfidz', 'Santri', 'Kajian', 'PPDB', 'Prestasi'])->mapWithKeys(function ($name) {
            return [
                $name => NewsTag::updateOrCreate(
                    ['slug' => Str::slug($name)],
                    ['name' => $name]
                )
            ];
        });

        $authors = collect([
            ['Ahmad Fauzi', 'XII A', 'Santri Jurnalis'],
            ['Muhammad Rizki', 'XI B', 'Admin Media'],
            ['Siti Aisyah', 'Alumni 2024', 'Kontributor'],
            ['Abdullah Hasan', 'XII Tahfidz', 'Reporter Santri'],
            ['Nur Fatimah', 'XI Putri', 'Tim Literasi'],
        ])->mapWithKeys(function ($item, $i) {
            return [
                $item[0] => Author::updateOrCreate(
                    ['name' => $item[0]],
                    [
                        'class_name' => $item[1],
                        'role' => $item[2],
                        'bio' => 'Penulis berita dan kontributor media Pondok Pesantren Assaidiyyah.',
                        'photo' => 'https://images.unsplash.com/photo-' . [
                            '1500648767791-00dcc994a43e',
                            '1507003211169-0a1dd7228f2d',
                            '1494790108377-be9c29b29330',
                            '1506794778202-cad84cf45f1d',
                            '1544005313-94ddf0286df2',
                        ][$i] . '?q=80&w=600',
                    ]
                )
            ];
        });

        Program::insert([
            ['title' => 'Tahfidz Al-Qur’an', 'icon' => '📖', 'image' => 'https://images.unsplash.com/photo-1609599006353-e629aaabfeae?q=80&w=1200', 'description' => 'Program hafalan Al-Qur’an dengan pembinaan intensif.', 'sort_order' => 1, 'status' => 'published', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Kajian Kitab Kuning', 'icon' => '📚', 'image' => 'https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?q=80&w=1200', 'description' => 'Pembelajaran kitab turats bersama asatidz berpengalaman.', 'sort_order' => 2, 'status' => 'published', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Bahasa Arab', 'icon' => '🌍', 'image' => 'https://images.unsplash.com/photo-1456513080510-7bf3a84b82f8?q=80&w=1200', 'description' => 'Pembiasaan muhadasah dan penguasaan dasar bahasa Arab.', 'sort_order' => 3, 'status' => 'published', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Madrasah Diniyah', 'icon' => '🕌', 'image' => 'https://images.unsplash.com/photo-1577896851231-70ef18881754?q=80&w=1200', 'description' => 'Pendidikan diniyah untuk memperkuat pemahaman agama.', 'sort_order' => 4, 'status' => 'published', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Ekstrakurikuler Santri', 'icon' => '🏆', 'image' => 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=1200', 'description' => 'Pengembangan bakat santri melalui kegiatan pilihan.', 'sort_order' => 5, 'status' => 'published', 'created_at' => now(), 'updated_at' => now()],
        ]);

        Teacher::insert([
            ['name' => 'KH. Ahmad Assaidiyyah', 'position' => 'Pengasuh Pondok', 'education' => 'Pesantren Salaf', 'phone' => '0811111111', 'photo' => 'https://images.unsplash.com/photo-1560250097-0b93528c311a?q=80&w=600', 'bio' => 'Pengasuh utama Pondok Pesantren Assaidiyyah.', 'sort_order' => 1, 'status' => 'active', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ust. Muhammad Fikri', 'position' => 'Kepala Madrasah', 'education' => 'S.Pd.I', 'phone' => '0822222222', 'photo' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=600', 'bio' => 'Koordinator pendidikan formal dan diniyah.', 'sort_order' => 2, 'status' => 'active', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ust. Abdullah Hasan', 'position' => 'Koordinator Tahfidz', 'education' => 'Hafidz 30 Juz', 'phone' => '0833333333', 'photo' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?q=80&w=600', 'bio' => 'Pembimbing tahfidz dan murajaah santri.', 'sort_order' => 3, 'status' => 'active', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ust. Zainal Arifin', 'position' => 'Guru Kitab', 'education' => 'Alumni Pesantren', 'phone' => '0844444444', 'photo' => 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?q=80&w=600', 'bio' => 'Pengajar kitab kuning dan fiqih.', 'sort_order' => 4, 'status' => 'active', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ust. Fauzan Hadi', 'position' => 'Pembina Bahasa', 'education' => 'S.Pd', 'phone' => '0855555555', 'photo' => 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?q=80&w=600', 'bio' => 'Pembina bahasa Arab dan Inggris.', 'sort_order' => 5, 'status' => 'active', 'created_at' => now(), 'updated_at' => now()],
        ]);

        Organization::insert([
            ['name' => 'KH. Ahmad Assaidiyyah', 'position' => 'Pengasuh Pondok', 'photo' => 'https://images.unsplash.com/photo-1560250097-0b93528c311a?q=80&w=600', 'bio' => 'Pengasuh utama pondok.', 'sort_order' => 1, 'status' => 'active', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'H. Abdullah Karim', 'position' => 'Ketua Yayasan', 'photo' => 'https://images.unsplash.com/photo-1568602471122-7832951cc4c5?q=80&w=600', 'bio' => 'Ketua yayasan Assaidiyyah.', 'sort_order' => 2, 'status' => 'active', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ust. Fikri Ramadhan', 'position' => 'Direktur Pendidikan', 'photo' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=600', 'bio' => 'Direktur pendidikan pondok.', 'sort_order' => 3, 'status' => 'active', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ust. Arif Hidayat', 'position' => 'Sekretaris', 'photo' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?q=80&w=600', 'bio' => 'Sekretaris pondok.', 'sort_order' => 4, 'status' => 'active', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ust. Hamdan Yusuf', 'position' => 'Bendahara', 'photo' => 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?q=80&w=600', 'bio' => 'Bendahara pondok.', 'sort_order' => 5, 'status' => 'active', 'created_at' => now(), 'updated_at' => now()],
        ]);

        $newsData = [
            ['Wisuda Tahfidz Angkatan 2026', 'Kegiatan wisuda tahfidz berlangsung meriah dan penuh haru.', 'Kegiatan Pondok', 'Tahfidz', 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=1200'],
            ['Pembukaan Tahun Ajaran Baru', 'Santri baru mulai masuk asrama dan mengikuti masa orientasi.', 'PPDB', 'PPDB', 'https://images.unsplash.com/photo-1509062522246-3755977927d7?q=80&w=1200'],
            ['Kajian Akbar Muharram', 'Kajian bersama ulama nasional dalam rangka menyambut tahun baru hijriyah.', 'Kajian', 'Kajian', 'https://images.unsplash.com/photo-1519817650390-64a93db511aa?q=80&w=1200'],
            ['Santri Raih Juara MTQ', 'Santri Assaidiyyah berhasil meraih juara pada ajang MTQ tingkat provinsi.', 'Prestasi', 'Prestasi', 'https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?q=80&w=1200'],
            ['Bakti Sosial Santri', 'Santri mengadakan bakti sosial sebagai bentuk kepedulian kepada masyarakat.', 'Santri', 'Santri', 'https://images.unsplash.com/photo-1517048676732-d65bc937f952?q=80&w=1200'],
        ];

        foreach ($newsData as $i => [$title, $excerpt, $category, $tag, $image]) {
            $news = News::updateOrCreate(
                ['slug' => Str::slug($title)],
                [
                    'news_category_id' => $categories[$category]->id,
                    'author_id' => $authors->values()[$i]->id,
                    'title' => $title,
                    'thumbnail' => $image,
                    'excerpt' => $excerpt,
                    'content' => '<p>' . $excerpt . '</p><p>Berita ini merupakan contoh data demo untuk website Pondok Pesantren Assaidiyyah.</p>',
                    'status' => 'published',
                    'published_at' => now()->subDays($i),
                    'is_featured' => $i === 0,
                    'views' => rand(100, 900),
                    'meta_title' => $title,
                    'meta_description' => $excerpt,
                    'meta_keywords' => 'assaidiyyah, pesantren, ' . strtolower($tag),
                    'og_image' => $image,
                ]
            );

            $news->tags()->sync([$tags[$tag]->id]);
        }

        Gallery::insert([
            ['title' => 'Kegiatan Tahfidz', 'image' => 'https://images.unsplash.com/photo-1609599006353-e629aaabfeae?q=80&w=1200', 'category' => 'Tahfidz', 'status' => 'published', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Belajar Bersama', 'image' => 'https://images.unsplash.com/photo-1509062522246-3755977927d7?q=80&w=1200', 'category' => 'Pendidikan', 'status' => 'published', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Kajian Santri', 'image' => 'https://images.unsplash.com/photo-1519817650390-64a93db511aa?q=80&w=1200', 'category' => 'Kajian', 'status' => 'published', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Kegiatan Asrama', 'image' => 'https://images.unsplash.com/photo-1517048676732-d65bc937f952?q=80&w=1200', 'category' => 'Asrama', 'status' => 'published', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Wisuda Santri', 'image' => 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=1200', 'category' => 'Wisuda', 'status' => 'published', 'created_at' => now(), 'updated_at' => now()],
        ]);

        Achievement::insert([
            ['title' => 'Juara 1 Tahfidz Kabupaten', 'student_name' => 'Ahmad Fauzi', 'level' => 'Kabupaten', 'category' => 'Tahfidz', 'achievement_date' => now()->subDays(10), 'image' => 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=1200', 'description' => 'Prestasi membanggakan dalam lomba tahfidz.', 'status' => 'published', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Juara 2 MTQ Provinsi', 'student_name' => 'Muhammad Rizki', 'level' => 'Provinsi', 'category' => 'MTQ', 'achievement_date' => now()->subDays(20), 'image' => 'https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?q=80&w=1200', 'description' => 'Prestasi dalam Musabaqah Tilawatil Quran.', 'status' => 'published', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Juara Pidato Bahasa Arab', 'student_name' => 'Abdullah', 'level' => 'Kabupaten', 'category' => 'Bahasa', 'achievement_date' => now()->subDays(30), 'image' => 'https://images.unsplash.com/photo-1456513080510-7bf3a84b82f8?q=80&w=1200', 'description' => 'Prestasi dalam lomba pidato bahasa Arab.', 'status' => 'published', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Juara Cerdas Cermat Islami', 'student_name' => 'Ali Imron', 'level' => 'Nasional', 'category' => 'Akademik', 'achievement_date' => now()->subDays(40), 'image' => 'https://images.unsplash.com/photo-1503676260728-1c00da094a0b?q=80&w=1200', 'description' => 'Prestasi akademik santri tingkat nasional.', 'status' => 'published', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Juara Kaligrafi', 'student_name' => 'Zainuddin', 'level' => 'Provinsi', 'category' => 'Seni Islami', 'achievement_date' => now()->subDays(50), 'image' => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?q=80&w=1200', 'description' => 'Prestasi seni kaligrafi santri.', 'status' => 'published', 'created_at' => now(), 'updated_at' => now()],
        ]);

        Testimonial::insert([
            ['name' => 'Abdul Aziz', 'role' => 'Alumni 2020', 'photo' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?q=80&w=600', 'message' => 'Pondok ini membentuk saya menjadi pribadi yang disiplin dan cinta Al-Qur’an.', 'rating' => 5, 'status' => 'published', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Nur Aisyah', 'role' => 'Wali Santri', 'photo' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?q=80&w=600', 'message' => 'Perkembangan anak saya sangat baik sejak mondok di Assaidiyyah.', 'rating' => 5, 'status' => 'published', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Fikri Hidayat', 'role' => 'Alumni', 'photo' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=600', 'message' => 'Lingkungan islami, pengajar sabar, dan kegiatan sangat positif.', 'rating' => 5, 'status' => 'published', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'H. Abdullah', 'role' => 'Tokoh Masyarakat', 'photo' => 'https://images.unsplash.com/photo-1568602471122-7832951cc4c5?q=80&w=600', 'message' => 'Assaidiyyah menjadi kebanggaan masyarakat sekitar.', 'rating' => 5, 'status' => 'published', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Siti Fatimah', 'role' => 'Wali Santri', 'photo' => 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?q=80&w=600', 'message' => 'Saya sangat merekomendasikan pesantren ini untuk pendidikan anak.', 'rating' => 5, 'status' => 'published', 'created_at' => now(), 'updated_at' => now()],
        ]);

        Student::insert([
            ['nis' => 'S001', 'name' => 'Ahmad Fauzi', 'gender' => 'male', 'birth_place' => 'Bandung', 'birth_date' => now()->subYears(15), 'address' => 'Bandung', 'class_name' => 'IX A', 'dormitory' => 'Asrama Umar', 'guardian_name' => 'Bapak Hasan', 'guardian_phone' => '0811111111', 'photo' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?q=80&w=600', 'status' => 'active', 'created_at' => now(), 'updated_at' => now()],
            ['nis' => 'S002', 'name' => 'Muhammad Rizki', 'gender' => 'male', 'birth_place' => 'Garut', 'birth_date' => now()->subYears(14), 'address' => 'Garut', 'class_name' => 'VIII B', 'dormitory' => 'Asrama Abu Bakar', 'guardian_name' => 'Bapak Rahmat', 'guardian_phone' => '0822222222', 'photo' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=600', 'status' => 'active', 'created_at' => now(), 'updated_at' => now()],
            ['nis' => 'S003', 'name' => 'Siti Aisyah', 'gender' => 'female', 'birth_place' => 'Cianjur', 'birth_date' => now()->subYears(15), 'address' => 'Cianjur', 'class_name' => 'IX Putri', 'dormitory' => 'Asrama Khadijah', 'guardian_name' => 'Ibu Aminah', 'guardian_phone' => '0833333333', 'photo' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?q=80&w=600', 'status' => 'active', 'created_at' => now(), 'updated_at' => now()],
            ['nis' => 'S004', 'name' => 'Nur Fatimah', 'gender' => 'female', 'birth_place' => 'Bogor', 'birth_date' => now()->subYears(13), 'address' => 'Bogor', 'class_name' => 'VII Putri', 'dormitory' => 'Asrama Aisyah', 'guardian_name' => 'Bapak Yusuf', 'guardian_phone' => '0844444444', 'photo' => 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?q=80&w=600', 'status' => 'active', 'created_at' => now(), 'updated_at' => now()],
            ['nis' => 'S005', 'name' => 'Abdullah Hasan', 'gender' => 'male', 'birth_place' => 'Tasikmalaya', 'birth_date' => now()->subYears(16), 'address' => 'Tasikmalaya', 'class_name' => 'X Tahfidz', 'dormitory' => 'Asrama Ali', 'guardian_name' => 'Bapak Karim', 'guardian_phone' => '0855555555', 'photo' => 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?q=80&w=600', 'status' => 'active', 'created_at' => now(), 'updated_at' => now()],
        ]);

        Announcement::insert([
            ['title' => 'Libur Maulid Nabi', 'content' => 'Kegiatan belajar diliburkan selama satu hari.', 'status' => 'published', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Pembayaran Syahriah', 'content' => 'Pembayaran syahriah dilakukan maksimal tanggal 10.', 'status' => 'published', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Kunjungan Wali Santri', 'content' => 'Jadwal kunjungan wali santri dibuka akhir pekan.', 'status' => 'published', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Jadwal Ujian Diniyah', 'content' => 'Ujian diniyah dimulai pekan depan.', 'status' => 'published', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Informasi PPDB', 'content' => 'Pendaftaran santri baru telah dibuka.', 'status' => 'published', 'created_at' => now(), 'updated_at' => now()],
        ]);

        Agenda::insert([
            ['title' => 'Kajian Akbar', 'event_date' => now()->addDays(3), 'location' => 'Aula Pondok', 'description' => 'Kajian bersama wali santri.', 'status' => 'published', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Wisuda Tahfidz', 'event_date' => now()->addDays(10), 'location' => 'Masjid Pondok', 'description' => 'Wisuda tahfidz santri.', 'status' => 'published', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Lomba Santri', 'event_date' => now()->addDays(14), 'location' => 'Lapangan Pondok', 'description' => 'Lomba antar kelas.', 'status' => 'published', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Rapat Wali Santri', 'event_date' => now()->addDays(20), 'location' => 'Aula Utama', 'description' => 'Rapat evaluasi perkembangan santri.', 'status' => 'published', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Pembukaan PPDB', 'event_date' => now()->addDays(30), 'location' => 'Sekretariat', 'description' => 'Pembukaan pendaftaran santri baru.', 'status' => 'published', 'created_at' => now(), 'updated_at' => now()],
        ]);

        Registration::insert([
            ['registration_number' => 'PPDB-2026-0001', 'student_name' => 'Calon Santri 1', 'gender' => 'male', 'birth_place' => 'Bandung', 'birth_date' => now()->subYears(12), 'address' => 'Bandung', 'guardian_name' => 'Wali 1', 'guardian_phone' => '0811111001', 'school_origin' => 'SD Negeri 1', 'program_choice' => 'Tahfidz', 'notes' => 'Ingin masuk program tahfidz.', 'status' => 'pending', 'created_at' => now(), 'updated_at' => now()],
            ['registration_number' => 'PPDB-2026-0002', 'student_name' => 'Calon Santri 2', 'gender' => 'female', 'birth_place' => 'Bogor', 'birth_date' => now()->subYears(12), 'address' => 'Bogor', 'guardian_name' => 'Wali 2', 'guardian_phone' => '0811111002', 'school_origin' => 'SD Negeri 2', 'program_choice' => 'Reguler', 'notes' => 'Siap mengikuti seleksi.', 'status' => 'verified', 'created_at' => now(), 'updated_at' => now()],
            ['registration_number' => 'PPDB-2026-0003', 'student_name' => 'Calon Santri 3', 'gender' => 'male', 'birth_place' => 'Garut', 'birth_date' => now()->subYears(13), 'address' => 'Garut', 'guardian_name' => 'Wali 3', 'guardian_phone' => '0811111003', 'school_origin' => 'MI Al-Hidayah', 'program_choice' => 'Kitab Kuning', 'notes' => 'Pernah belajar dasar kitab.', 'status' => 'accepted', 'created_at' => now(), 'updated_at' => now()],
            ['registration_number' => 'PPDB-2026-0004', 'student_name' => 'Calon Santri 4', 'gender' => 'female', 'birth_place' => 'Cianjur', 'birth_date' => now()->subYears(11), 'address' => 'Cianjur', 'guardian_name' => 'Wali 4', 'guardian_phone' => '0811111004', 'school_origin' => 'SDIT Harapan', 'program_choice' => 'Bahasa Arab', 'notes' => 'Minat bahasa Arab.', 'status' => 'pending', 'created_at' => now(), 'updated_at' => now()],
            ['registration_number' => 'PPDB-2026-0005', 'student_name' => 'Calon Santri 5', 'gender' => 'male', 'birth_place' => 'Tasikmalaya', 'birth_date' => now()->subYears(12), 'address' => 'Tasikmalaya', 'guardian_name' => 'Wali 5', 'guardian_phone' => '0811111005', 'school_origin' => 'SD Negeri 5', 'program_choice' => 'Tahfidz', 'notes' => 'Sudah hafal 2 juz.', 'status' => 'pending', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}