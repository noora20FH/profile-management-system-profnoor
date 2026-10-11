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
                    optional($item->published_at)
                    ->format("Y"),

                "title" =>
                    $item->title,

                "description" =>
                    $item->abstract,

                "url" =>
                    $item->url,

                "journal" =>
                    $item->journal,

                "doi" =>
                    $item->doi,
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
            "Daftar publikasi penelitian",

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
}
