<?php

namespace App\Domains\Course\Services;

use App\Domains\Course\Models\Course;

class CourseService
{
    public function pageData(): array
    {
        $items = Course::query()
            ->where("is_published", true)
            ->orderByDesc("year")
            ->orderBy("sort_order")
            ->get()
            ->map(
                fn(Course $course): array => [
                    "id" => (string) $course->getKey(),
                    "year" => (string) $course->year,
                    "image" => $course->image_path,
                    "code" => $course->code,
                    "term" => $course->semester . " " . $course->year,
                    "title" => $course->title,
                    "description" => $course->description,
                    "slug" => $course->slug,
                    'syllabus_url' => $course->syllabus_url,
                ],
            )
            ->all();

        return [
            "eyebrow" => "PENAWARAN AKADEMIK",
            "title" => "Mata Kuliah",
            "description" =>
                "Jelajahi mata kuliah sistem terdistribusi, pembelajaran mesin, dan komputasi modern yang tersedia pada tahun akademik berjalan.",
            "allLabel" => "Semua Mata Kuliah",
            "previousLabel" => "Mata Kuliah Sebelumnya",
            "filterLabel" => "Filter berdasarkan Tahun:",
            "resultLabel" => "Menampilkan " . count($items) . " Mata Kuliah",
            "landing" => [
                "eyebrow" => "MATA KULIAH YANG DIAMPU",
                "title" => "Penawaran Akademik Saat Ini",
                "ctaLabel" => "Lihat Semua Mata Kuliah",
                "featuredCount" => 3,
            ],
            "assets" => [
                "chevron" => "/assets/courses/ee510.svg",
                "arrow" => "/assets/courses/a93d8.svg",
                "logo" => "/assets/courses/325dd.svg",
            ],
            "items" => $items,
        ];
    }
}
