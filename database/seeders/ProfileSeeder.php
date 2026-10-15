<?php

namespace Database\Seeders;

use App\Domains\Profile\Models\Profile;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    public function run(): void
    {
        Profile::query()->update(['is_active' => false]);

        Profile::updateOrCreate(
            ['email' => 'moh.noor@polinema.ac.id'],
            [
                'name'          => 'Prof. Mohammad Noor Hidayat',
                'title'         => 'Professor and Academic Researcher',
                'status_pill'   => 'KETUA ILMU & TEKNIK KOMPUTER',
                'institution'   => 'Institut Teknologi Metropolitan',
                'phone'         => '081234567890',
                'is_active'     => true,

                // HERO
                'hero_description' => 'Merintis sistem AI terdistribusi, kerangka komputasi edge terfederasi yang aman, dan solusi jaringan tangguh berskala global. Berdedikasi untuk mendidik generasi penerus akademisi komputasi dan mengubah teknologi mentah menjadi manfaat bagi komunitas global.',
                'hero_photo_path'  => 'assets/2e406.png',
                'hero_cta_primary_label'   => 'Lihat Daftar Penelitian',
                'hero_cta_primary_url'     => '/Penelitian',
                'hero_cta_secondary_label' => 'Hubungi Saya',
                'hero_metrics' => [
                    [
                        'value'  => '18+',
                        'label'  => 'Tahun Pengalaman',
                        'detail' => 'Riset & pengajaran di bidang sistem terdistribusi.',
                    ],
                    [
                        'value'  => '120+',
                        'label'  => 'Publikasi Ilmiah',
                        'detail' => 'Jurnal & konferensi internasional bereputasi.',
                    ],
                    [
                        'value'  => '35+',
                        'label'  => 'Program Pengabdian',
                        'detail' => 'Kolaborasi dengan desa mitra & komunitas.',
                    ],
                ],

                // BIOGRAFI
                'biography_photo_path' => 'assets/0426e.png',
                'biography_eyebrow'    => 'BIOGRAFI',
                'biography_title'      => 'Latar Belakang Akademik',
                'biography_paragraphs' => [
                    'Prof. Mohammad Noor Hidayat adalah Profesor Sistem Terdistribusi dengan jalur tenur di Institut Teknologi Metropolitan. Selama lebih dari 18 tahun, kelompok Penelitiannya berkarya di persimpangan antara model kecerdasan buatan berdimensi tinggi yang kompleks dan perangkat keras jaringan terdesentralisasi.',
                    'Ia meraih gelar Ph.D. dalam Ilmu Komputer dari Universitas Cambridge dengan spesialisasi pada model eksekusi transaksional berkinerja tinggi. Ia merupakan penerima langsung berbagai penghargaan makalah internasional bergengsi dan saat ini bertugas dalam dewan penasihat komputasi global untuk standar jaringan generasi berikutnya.',
                ],
                'qualifications' => [
                    [
                        'degree'      => 'Ph.D. CS',
                        'institution' => 'Universitas Cambridge (Divisi Spesialis Sistem Terdistribusi)',
                    ],
                    [
                        'degree'      => 'M.Sc. Eng',
                        'institution' => 'Universitas Teknik Nasional (Arsitektur Paralel Berkinerja Tinggi)',
                    ],
                ],
                'expertise_tags' => [
                    'Sistem Terdistribusi',
                    'Komputasi Edge AI',
                    'Pembelajaran Terfederasi',
                    'Ketahanan Bizantium',
                    'Kedaulatan Data',
                ],

                // Legacy (opsional, agar tidak breaking)
                'biography' => 'Dosen dan peneliti yang aktif dalam pengembangan ilmu pengetahuan, pendidikan tinggi, penelitian, dan pengabdian kepada masyarakat.',
            ]
        );
    }
}