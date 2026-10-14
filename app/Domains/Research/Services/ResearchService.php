<?php

namespace App\Domains\Research\Services;

use App\Domains\Research\Models\ResearchProject;

class ResearchService
{
    public function pageData(): array
    {
        $items = ResearchProject::query()
            ->where("is_published", true)
            ->orderByDesc("year")
            ->orderBy("sort_order")
            ->get()
            ->map(
                fn(ResearchProject $project): array => [
                    "id" => (string) $project->id,
                    "year" => (string) $project->year,
                    "image" => $project->image_path,
                    "title" => $project->title,
                    "description" => $project->summary,
                    "meta" => $project->funding_source,
                    "publication_url" => $project->publication_url,
                    "slug" => $project->slug,
                    "video_url" => $project->video_url,
                ],
            )
            ->all();

        return [
            "eyebrow" => "DAFTAR PORTOFOLIO",
            "title" => "Portofolio Penelitian",
            "description" =>
            "Hibah aktif, makalah fundamental, dan rekayasa sistem terapan berskala global. Telusuri lebih dari satu dekade inovasi komputasi terdesentralisasi.",
            "allLabel" => "Semua Penelitian",
            "previousLabel" => "Penelitian Sebelumnya",
            "filterLabel" => "Filter berdasarkan Tahun:",
            "resultLabel" => "Menampilkan " . count($items) . " Proyek Utama",
            "landing" => [
                "eyebrow" => "PORTOFOLIO PENELITIAN",
                "title" => "Bidang Aktif & Proyek Utama",
                "ctaLabel" => "Jelajahi Penelitian",
                "featuredCount" => 3,
            ],
            "assets" => [
                "chevron" => "/assets/research/b1399.svg",
                "arrow" => "/assets/research/7c1ef.svg",
                "logo" => "/assets/research/325dd.svg",
                "eyebrowIcon" => "/assets/research/4a311.svg",
                "divider" => "/assets/research/73368.svg",
            ],
            "items" => $items,
        ];
    }
}
