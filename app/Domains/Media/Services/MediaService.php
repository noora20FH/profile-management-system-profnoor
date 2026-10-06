<?php

namespace App\Domains\Media\Services;

use App\Domains\Media\Models\MediaAsset;
use Illuminate\Database\Eloquent\Collection;

class MediaService
{
    public function collection(string $collection): Collection
    {
        return MediaAsset::query()
            ->where("collection", $collection)
            ->latest()
            ->get();
    }
}
