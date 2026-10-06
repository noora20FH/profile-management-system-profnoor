<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Domains\Profile\Models\Profile;
use App\Domains\Research\Models\ResearchProject;
use App\Domains\Publication\Models\Publication;
use App\Domains\Course\Models\Course;
use App\Domains\Outreach\Models\OutreachProgram;
use App\Domains\CMS\Models\ContentBlock;
use App\Domains\CMS\Models\Setting;
use App\Domains\Media\Models\MediaAsset;
use App\Domains\Consultation\Models\Consultation;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'mohnoorhidayat64@gmail.com'],
            [
                'name' => 'Prof Noor',
                'password' => Hash::make('password'),
            ]
        );

        Profile::create([
            'name' => 'Prof Noor',
            'title' => 'Professor and Academic Researcher',
            'email' => 'mohnoorhidayat64@gmail.com',
            'phone' => '081234567890',
            'institution' => 'Universitas Contoh Indonesia',
            'biography' => 'Dosen dan peneliti yang aktif dalam pengembangan ilmu pengetahuan, pendidikan tinggi, penelitian, dan pengabdian kepada masyarakat.',
            'hero_description' => 'Membangun ekosistem akademik melalui pendidikan, penelitian inovatif, dan kontribusi sosial berkelanjutan.',
            'photo_path' => 'profiles/prof-noor.jpg',
            'is_active' => true,
        ]);

        $research = ResearchProject::create([
            'title' => 'Pengembangan Sistem Informasi Akademik Berbasis Data',
            'slug' => 'pengembangan-sistem-informasi-akademik-berbasis-data',
            'summary' => 'Penelitian mengenai pemanfaatan teknologi informasi untuk mendukung pengelolaan data akademik yang efektif.',
            'year' => 2026,
            'funding_source' => 'Internal Research Grant',
            'image_path' => 'research/research-1.jpg',
            'publication_url' => null,
            'is_featured' => true,
            'is_published' => true,
            'sort_order' => 1,
        ]);

        Publication::create([
            'research_project_id' => $research->id,
            'title' => 'Data Driven Academic Management System',
            'slug' => 'data-driven-academic-management-system',
            'abstract' => 'Artikel ilmiah mengenai penerapan sistem informasi berbasis data dalam pengelolaan akademik.',
            'journal' => 'Journal of Information and Education Technology',
            'published_at' => '2026-05-10',
            'doi' => '10.0000/example-doi',
            'url' => 'https://example.com/publication',
            'is_published' => true,
        ]);

        Course::insert([
            [
                'code' => 'IF101',
                'title' => 'Pengantar Teknologi Informasi',
                'slug' => 'pengantar-teknologi-informasi',
                'description' => 'Mata kuliah dasar teknologi informasi, sistem komputer, dan penerapan digital.',
                'semester' => '1',
                'year' => 2026,
                'image_path' => 'courses/if101.jpg',
                'syllabus_url' => null,
                'is_featured' => true,
                'is_published' => true,
                'sort_order' => 1,
            ],
            [
                'code' => 'DS201',
                'title' => 'Analisis Data dan Visualisasi',
                'slug' => 'analisis-data-dan-visualisasi',
                'description' => 'Pembelajaran pengolahan data, analisis statistik, dan penyajian informasi.',
                'semester' => '3',
                'year' => 2026,
                'image_path' => 'courses/ds201.jpg',
                'syllabus_url' => null,
                'is_featured' => true,
                'is_published' => true,
                'sort_order' => 2,
            ],
        ]);

        OutreachProgram::create([
            'title' => 'Pelatihan Literasi Digital Masyarakat',
            'slug' => 'pelatihan-literasi-digital-masyarakat',
            'category' => 'Pengabdian Masyarakat',
            'description' => 'Program pemberdayaan masyarakat melalui pelatihan teknologi digital.',
            'year' => '2026',
            'image_path' => 'outreach/digital-literacy.jpg',
            'primary_metric' => '150 Peserta',
            'secondary_metric' => '5 Desa Mitra',
            'is_featured' => true,
            'is_published' => true,
            'sort_order' => 1,
        ]);

        ContentBlock::insert([
            [
                'key' => 'about',
                'title' => 'Tentang Prof Noor',
                'content' => 'Profil akademik, pengalaman, dan kontribusi penelitian Prof Noor.',
                'metadata' => json_encode(['section' => 'about']),
                'is_published' => true,
            ],
            [
                'key' => 'contact',
                'title' => 'Kontak',
                'content' => 'Hubungi untuk kerja sama penelitian dan akademik.',
                'metadata' => json_encode(['section' => 'contact']),
                'is_published' => true,
            ],
        ]);

        Setting::insert([
            [
                'key' => 'site_name',
                'value' => json_encode('Academic Profile Prof Noor'),
                'group' => 'general',
                'is_public' => true,
            ],
            [
                'key' => 'site_description',
                'value' => json_encode('Website profil akademik dan portofolio penelitian.'),
                'group' => 'general',
                'is_public' => true,
            ],
        ]);

        MediaAsset::create([
            'disk' => 'public',
            'path' => 'media/profile.jpg',
            'filename' => 'profile.jpg',
            'mime_type' => 'image/jpeg',
            'size' => 250000,
            'alt_text' => 'Foto Prof Noor',
            'collection' => 'profile',
        ]);

        Consultation::create([
            'name' => 'Ahmad Mahasiswa',
            'email' => 'ahmad@example.com',
            'topic' => 'Konsultasi Penelitian',
            'message' => 'Permohonan konsultasi terkait penelitian akademik.',
            'preferred_at' => now()->addDays(3),
            'status' => 'pending',
        ]);
    }
}
