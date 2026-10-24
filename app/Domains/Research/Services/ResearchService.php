<?php

namespace App\Domains\Research\Services;

use App\Domains\Research\Models\ResearchProject;

class ResearchService
{
public function homepageData(int $limit = 3): array
{
    $items = ResearchProject::query()
        ->where("is_published", true)
        ->where("is_featured", true)
        ->orderByDesc("year")
        ->orderBy("sort_order")
        ->limit($limit)
        ->get()
        ->map(fn(ResearchProject $project): array => $this->transform($project))
        ->all();

    return [
        "landing" => [
            "eyebrow"       => "PORTOFOLIO PENELITIAN",
            "title"         => "Bidang Aktif & Proyek Utama",
            "ctaLabel"      => "Jelajahi Penelitian",
            "featuredCount" => $limit,
        ],
        "assets" => [
            "chevron"     => "/assets/research/b1399.svg",
            "arrow"       => "/assets/research/7c1ef.svg",
            "logo"        => "/assets/research/325dd.svg",
            "eyebrowIcon" => "/assets/research/4a311.svg",
            "divider"     => "/assets/research/73368.svg",
        ],
        "items" => $items,
    ];
}

public function pageData(): array
{
    $items = ResearchProject::query()
        ->where("is_published", true)
        ->orderByDesc("year")
        ->orderBy("sort_order")
        ->get()
        ->map(fn(ResearchProject $project): array => $this->transform($project))
        ->all();

    return [
        "eyebrow"       => "DAFTAR PORTOFOLIO",
        "title"         => "Portofolio Penelitian",
        "description"   => "Berfokus pada riset terapan dan fundamental di bidang energi terbarukan, sistem tenaga listrik, dan manajemen energi. Penelitian yang dijalankan tidak hanya bersifat teoretis, tetapi juga menghasilkan inovasi teknologi tepat guna, mulai dari pengembangan pembangkit listrik hingga sistem monitoring berbasis IoT.",
        "allLabel"      => "Semua Penelitian",
        "previousLabel" => "Penelitian Sebelumnya",
        "filterLabel"   => "Filter berdasarkan Tahun:",
        "resultLabel"   => "Menampilkan " . count($items) . " Proyek Utama",
        "landing" => [
            "eyebrow"       => "PORTOFOLIO PENELITIAN",
            "title"         => "Bidang Aktif & Proyek Utama",
            "ctaLabel"      => "Jelajahi Penelitian",
            "featuredCount" => 3,
        ],
        "assets" => [
            "chevron"     => "/assets/research/b1399.svg",
            "arrow"       => "/assets/research/7c1ef.svg",
            "logo"        => "/assets/research/325dd.svg",
            "eyebrowIcon" => "/assets/research/4a311.svg",
            "divider"     => "/assets/research/73368.svg",
        ],
        "items" => $items,
    ];
}

private function transform(ResearchProject $project): array
{
    return [
        "id"              => (string) $project->id,
        "year"            => (string) $project->year,
        "image_url"           => $project->image_path,
        "title"           => $project->title,
        "description"     => $project->summary,
        "meta"            => $project->funding_source,
        "publication_url" => $project->publication_url,
        "slug"            => $project->slug,
        "video_url"       => $project->video_url,
    ];
}
}
