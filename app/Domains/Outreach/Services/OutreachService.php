<?php

namespace App\Domains\Outreach\Services;

use App\Domains\Outreach\Models\OutreachProgram;

class OutreachService
{
    public function pageData(): array
    {
        $items = OutreachProgram::query()
            ->where("is_published", true)
            ->orderByDesc("year")
            ->orderBy("sort_order")
            ->get()
            ->map(
                fn(OutreachProgram $program): array => [
                    "id" => (string)$program->id,
                    "year" => (string)$program->year,
                    "image" => $program->image_path,
                    "category" => $program->category,
                    "title" => $program->title,
                    "description" => $program->description,
                    "metrics" => [
                        $program->primary_metric,
                        $program->secondary_metric
                    ],
                    "impact_url" => $program->impact_url,
                    "video_url" => $program->video_url,
                    "slug" => $program->slug,
                ],
            )
            ->all();

        return [
            "eyebrow" => "DAMPAK SOSIAL",
            "title" => "Pengabdian Masyarakat",
            "description" =>
            "Menjembatani arsitektur teknis sistem terdistribusi dengan pemberdayaan masyarakat regional. Menggali penerapan praktis jaringan komputasi untuk menjamin kesetaraan ekologis, pertanian, dan pendidikan.",
            "allLabel" => "Semua Program",
            "previousLabel" => "Pengabdian Sebelumnya",
            "filterLabel" => "Filter berdasarkan Tahun:",
            "resultLabel" =>
            "Menampilkan " . count($items) . " Program Pengabdian",
            "landing" => [
                "eyebrow" => "DAMPAK SOSIAL",
                "title" => "Inisiatif Pengabdian Masyarakat",
                "ctaLabel" => "Jelajahi Pengabdian",
                "featuredCount" => 2,
            ],
            "assets" => [
                "chevron" => "/assets/outreach/1de68.svg",
                "arrow" => "/assets/outreach/5b584.svg",
                "logo" => "/assets/outreach/325dd.svg",
                "filterIcon" => "/assets/outreach/fd094.svg",
                "primaryMetricIcon" => "/assets/outreach/273d5.svg",
                "secondaryMetricIcon" => "/assets/outreach/4b034.svg",
            ],
            "items" => $items,
        ];
    }
}
