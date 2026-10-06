<?php

namespace App\Domains\Profile\Services;

use App\Domains\Profile\Models\Profile;

class ProfileService
{
    public function current(): ?Profile
    {
        return Profile::query()->where("is_active", true)->first();
    }

    public function metrics(): array
    {
        return [
            [
                "value" => "140+",
                "label" => "Publikasi Riset",
                "detail" => "indeks-h: 28 | 3,200+ Sitasi",
            ],
            [
                "value" => "18+",
                "label" => "Tahun Pengabdian Akademik",
                "detail" => "Di Institusi Global Terkemuka",
            ],
            [
                "value" => "5,000+",
                "label" => "Mahasiswa & Peserta Bimbingan",
                "detail" => "Kandidat Sarjana, MSc & Ph.D.",
            ],
        ];
    }
}
