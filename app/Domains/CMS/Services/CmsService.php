<?php

namespace App\Domains\CMS\Services;

use App\Domains\CMS\Models\ContentBlock;
use Illuminate\Database\Eloquent\Collection;

class CmsService
{
    public function published(): Collection
    {
        return ContentBlock::query()
            ->where("is_published", true)
            ->orderBy("key")
            ->get();
    }
}
