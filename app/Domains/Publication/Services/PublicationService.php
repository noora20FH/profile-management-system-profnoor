<?php

namespace App\Domains\Publication\Services;


use App\Domains\Publication\Models\Publication;
use Illuminate\Database\Eloquent\Collection;


class PublicationService
{

    public function published(): Collection
    {
        return Publication::query()

            ->with("researchProject")

            ->where(
                "is_published",
                true
            )

            ->latest("published_at")

            ->get();
    }

    public function items()
    {
        return $this->published()
            ->map(function ($item) {

                return [

                    "id" => $item->id,

                    "year" =>
                    $item->published_at
                        ? $item->published_at->format("Y")
                        : null,


                    "title" =>
                    $item->title,


                    "abstract" =>
                    $item->abstract,


                    "type" =>
                    $item->type,


                    "type_label" =>
                    $item->type_label,


                    "published_at" =>
                    $item->published_at,


                    "doi" =>
                    $item->doi,


                    "url" =>
                    $item->url,
                    "video_url" => $item->video_url,


                    "research_project" => $item->researchProject
                        ? [
                            "id" =>
                            $item->researchProject->id,

                            "title" =>
                            $item->researchProject->title,
                        ]
                        : null,

                ];
            });
    }

    public function findBySlug(
        string $slug
    ): ?Publication {

        return Publication::query()

            ->with("researchProject")

            ->where("slug", $slug)

            ->where(
                "is_published",
                true
            )

            ->first();
    }
    /**
     * Data untuk halaman publikasi
     */
    public function pageData()
    {
        return [
            "eyebrow" => "Publication",

            "title" =>
            "Publikasi Ilmiah",

            "description" =>
            "Dokumentasi jejak ilmiah berupa publikasi jurnal dan prosiding bereputasi internasional, buku referensi, serta kekayaan intelektual (paten dan hak cipta). Semua karya ini didedikasikan untuk kemajuan ilmu ketenagalistrikan dan pengembangan teknologi energi berkelanjutan.",

            "allLabel" => "Semua",

            "previousLabel" => "Sebelumnya",

            "filterLabel" => "Filter",

            "resultLabel" => "Publikasi",

            "landing" => [
                "eyebrow" => "Publication",
                "title" => "Publikasi",
                "ctaLabel" => "Lihat",
                "featuredCount" => 3
            ],

            "items" => $this->items(),

            "assets" => []
        ];
    }
    /**
     * Data untuk homepage
     */
    public function homepageData(int $limit = 3): array
    {
        $items = Publication::query()
            ->with("researchProject")
            ->where("is_published", true)
            ->latest("published_at")
            ->limit($limit)
            ->get();

        return [
            "landing" => [
                "eyebrow"       => "Publication",
                "title"         => "Publikasi",
                "ctaLabel"      => "Lihat",
                "featuredCount" => $limit,
            ],
            "assets" => [],
            "items"  => $items,
        ];
    }
}
