<?php

namespace App\Domains\Consultation\Actions;

use App\Domains\Consultation\Models\Consultation;

class UpsertConsultationAction
{
    public function execute(
        array $attributes,
        ?Consultation $record = null,
    ): Consultation {
        $record ??= new Consultation();
        $record->fill($attributes);
        $record->save();

        return $record;
    }
}
