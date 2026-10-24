<?php

namespace App\Domains\Course\Services;

use App\Domains\Course\Models\Course;

class CourseService
{
    /**
     * Data untuk halaman homepage — 3 unggulan terbaru.
     */
    public function homepageData(int $limit = 3): array
    {
        $items = Course::query()
            ->where("is_published", true)
            ->where("is_featured", true)      // ← hanya yang ditandai unggulan
            ->orderByDesc("year")             // tahun terbaru
            ->orderBy("sort_order")           // urutan kurasi
            ->limit($limit)                    // ← batasi di DB, bukan di React
            ->get()
            ->map(fn(Course $course): array => $this->transform($course))
            ->all();

        return [
            "landing" => [
                "eyebrow"      => "MATA KULIAH YANG DIAMPU",
                "title"        => "Penawaran Akademik Saat Ini",
                "ctaLabel"     => "Lihat Semua Mata Kuliah",
                "featuredCount" => $limit,
            ],
            "assets" => [
                "chevron" => "/assets/courses/ee510.svg",
                "arrow"   => "/assets/courses/a93d8.svg",
                "logo"    => "/assets/courses/325dd.svg",
            ],
            "items" => $items,
        ];
    }

    /**
     * Data untuk halaman /mata-kuliah — semua item.
     */
    public function pageData(): array
    {
        $items = Course::query()
            ->where("is_published", true)
            ->orderByDesc("year")
            ->orderBy("sort_order")
            ->get()
            ->map(fn(Course $course): array => $this->transform($course))
            ->all();

        return [
            "eyebrow"       => "PENAWARAN AKADEMIK",
            "title"         => "Pengajaran",
            "description"   => "Eksplorasi mata kuliah inti di bidang Teknik Elektro dan Energi Terbarukan. Kurikulum dirancang untuk membekali mahasiswa dengan pemahaman mendalam tentang sistem tenaga listrik, konversi energi, proteksi, serta otomasi dan monitoring cerdas yang relevan dengan kebutuhan industri saat ini.",
            "allLabel"      => "Semua Mata Kuliah",
            "previousLabel" => "Mata Kuliah Sebelumnya",
            "filterLabel"   => "Filter berdasarkan Tahun:",
            "resultLabel"   => "Menampilkan " . count($items) . " Mata Kuliah",
            "landing" => [
                "eyebrow"       => "MATA KULIAH YANG DIAMPU",
                "title"         => "Penawaran Akademik Saat Ini",
                "ctaLabel"      => "Lihat Semua Mata Kuliah",
                "featuredCount" => 3,
            ],
            "assets" => [
                "chevron" => "/assets/courses/ee510.svg",
                "arrow"   => "/assets/courses/a93d8.svg",
                "logo"    => "/assets/courses/325dd.svg",
            ],
            "items" => $items,
        ];
    }

    /**
     * Transformasi konsisten dipakai di kedua method.
     */
    private function transform(Course $course): array
    {
        return [
            "id"           => (string) $course->getKey(),
            "year"         => (string) $course->year,
            "image_url"        => $course->image_path,
            "code"         => $course->code,
            "term"         => $course->semester . " " . $course->year,
            "title"        => $course->title,
            "description"  => $course->description,
            "slug"         => $course->slug,
            "syllabus_url" => $course->syllabus_url,
        ];
    }
}