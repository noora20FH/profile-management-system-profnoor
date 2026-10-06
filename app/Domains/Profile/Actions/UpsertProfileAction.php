<?php

namespace App\Domains\Profile\Actions;

use App\Domains\Profile\Models\Profile;

class UpsertProfileAction
{
    public function execute(array $attributes, ?Profile $record = null): Profile
    {
        $record ??= new Profile();
        $record->fill($attributes);
        $record->save();

        return $record;
    }
}
