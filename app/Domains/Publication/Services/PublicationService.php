<?php

namespace App\Domains\Publication\Services;

use App\Domains\Publication\Models\Publication;
use Illuminate\Database\Eloquent\Collection;

class PublicationService
{
    public function published(): Collection
    {
        return Publication::query()
            ->where("is_published", true)
            ->latest("published_at")
            ->get();
    }
}
