<?php

namespace App\Domains\Publication\Actions;

use App\Domains\Publication\Models\Publication;

class UpsertPublicationAction
{
    public function execute(
        array $attributes,
        ?Publication $record = null,
    ): Publication {
        $record ??= new Publication();
        $record->fill($attributes);
        $record->save();

        return $record;
    }
}
