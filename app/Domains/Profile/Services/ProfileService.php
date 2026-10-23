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
                "value" => "108+",
                "label" => "Publikasi Penelitian",
                "detail" => "H-Index: 9 | 366+ Sitasi (Google Scholar)",
            ],
            [
                "value" => "25+",
                "label" => "Tahun Pengabdian Akademik",
                "detail" => "Politeknik Negeri Malang (sejak 2001)",
            ],
            [
                "value" => "500+",
                "label" => "Mahasiswa & Peserta Bimbingan",
                "detail" => "Kandidat Sarjana, MSc",
            ]
        ];
    }
}
