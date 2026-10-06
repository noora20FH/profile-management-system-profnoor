<?php

namespace App\Domains\Media\Actions;

use App\Domains\Media\Models\MediaAsset;

class UpsertMediaAssetAction
{
    public function execute(
        array $attributes,
        ?MediaAsset $record = null,
    ): MediaAsset {
        $record ??= new MediaAsset();
        $record->fill($attributes);
        $record->save();

        return $record;
    }
}
