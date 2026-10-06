<?php

namespace App\Domains\CMS\Actions;

use App\Domains\CMS\Models\ContentBlock;

class UpsertContentBlockAction
{
    public function execute(
        array $attributes,
        ?ContentBlock $record = null,
    ): ContentBlock {
        $record ??= new ContentBlock();
        $record->fill($attributes);
        $record->save();

        return $record;
    }
}
