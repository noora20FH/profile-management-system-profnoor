<?php

namespace App\Domains\Outreach\Actions;

use App\Domains\Outreach\Models\OutreachProgram;

class UpsertOutreachProgramAction
{
    public function execute(
        array $attributes,
        ?OutreachProgram $record = null,
    ): OutreachProgram {
        $record ??= new OutreachProgram();
        $record->fill($attributes);
        $record->save();

        return $record;
    }
}
