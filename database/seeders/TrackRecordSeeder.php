<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrackRecordSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        $data = [
            // I. Reviewer Jurnal
            ['type' => 'reviewer', 'title' => 'MethodsX', 'scope' => 'Internasional', 'institution' => 'ScienceDirect', 'sort_order' => 1],
            ['type' => 'reviewer', 'title' => 'Computers and Electrical Engineering', 'scope' => 'Internasional', 'institution' => 'ScienceDirect', 'sort_order' => 2],
            ['type' => 'reviewer', 'title' => 'International Journal of Power Electronics and Drive Systems (IJPEDS)', 'scope' => 'Internasional', 'institution' => 'Institute of Advanced Engineering and Science (IAES)', 'sort_order' => 3],
            ['type' => 'reviewer', 'title' => 'Asian Journal of Research and Reviews in Physics', 'scope' => 'Internasional', 'institution' => 'Asian Journal of Research and Reviews in Physics', 'sort_order' => 4],
            ['type' => 'reviewer', 'title' => 'Journal of Applied Smart Electrical Network and Systems (JASENS)', 'scope' => 'Nasional', 'institution' => 'Indonesia Society of Applied Science (ISAS)', 'sort_order' => 5],
            ['type' => 'reviewer', 'title' => 'Journal of Technology Management and Informatics (MATRIX)', 'scope' => 'Nasional', 'institution' => 'State Polytechnic of Bali', 'sort_order' => 6],
            ['type' => 'reviewer', 'title' => 'Jurnal Nasional Teknik Elektro dan Teknologi Informasi (JNTETI)', 'scope' => 'Nasional', 'institution' => 'Gajah Mada University', 'sort_order' => 7],
            ['type' => 'reviewer', 'title' => 'PoliGrid', 'scope' => 'Nasional', 'institution' => 'State Polytechnic of Samarinda', 'sort_order' => 8],
            ['type' => 'reviewer', 'title' => 'Elposys', 'scope' => 'Nasional', 'institution' => 'State Polytechnic of Malang', 'sort_order' => 9],
            ['type' => 'reviewer', 'title' => 'ELTEK', 'scope' => 'Nasional', 'institution' => 'State Polytechnic of Malang', 'sort_order' => 10],

            // J. Asesor
            ['type' => 'assessor', 'title' => 'Asesor Akreditasi Program Studi Keteknikan', 'institution' => 'Lembaga Akreditasi Mandiri Program Studi Keteknikan', 'sort_order' => 11],
            ['type' => 'assessor', 'title' => 'Asesor Kompetensi', 'institution' => 'Badan Nasional Sertifikasi Profesi', 'sort_order' => 12],
            ['type' => 'assessor', 'title' => 'Asesor Kompetensi Muda Distribusi Tenaga Listrik', 'institution' => 'Kementerian ESDM', 'sort_order' => 13],
            ['type' => 'assessor', 'title' => 'Asesor Kompetensi Muda Pemanfaatan Tenaga Listrik', 'institution' => 'Kementerian ESDM', 'sort_order' => 14],
            ['type' => 'assessor', 'title' => 'Asesor Beban Kerja Dosen (BKD)', 'institution' => 'Politeknik Negeri Malang', 'sort_order' => 15],
            ['type' => 'assessor', 'title' => 'Tim Penilai Angka Kredit', 'institution' => 'Politeknik Negeri Malang', 'sort_order' => 16],

            // K. Penghargaan
            ['type' => 'award', 'title' => 'Satyalancana Karya Satya XX Tahun', 'institution' => 'Presiden Republik Indonesia', 'details' => 'Tanda Kehormatan', 'year' => null, 'sort_order' => 17],
            ['type' => 'award', 'title' => 'Satyalancana Karya Satya X Tahun', 'institution' => 'Presiden Republik Indonesia', 'details' => 'Tanda Kehormatan', 'year' => null, 'sort_order' => 18],
            ['type' => 'award', 'title' => 'Piagam Penghargaan sebagai Panitia pada Kontes Robot Indonesia (KRI) Tahun 2018 Regional IV', 'institution' => 'Kementerian Riset, Teknologi, dan Pendidikan, Direktorat Jenderal Pembelajaran dan Kemahasiswaan', 'details' => 'Piagam Penghargaan', 'year' => '2018', 'sort_order' => 19],
        ];

        foreach ($data as &$item) {
            $item['created_at'] = $now;
            $item['updated_at'] = $now;
            if (!isset($item['scope'])) $item['scope'] = null;
            if (!isset($item['details'])) $item['details'] = null;
            if (!isset($item['year'])) $item['year'] = null;
        }

        DB::table('track_records')->insert($data);
    }
}