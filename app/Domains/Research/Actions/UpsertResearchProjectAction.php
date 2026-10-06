<?php

namespace App\Domains\Research\Actions;

use App\Domains\Research\Models\ResearchProject;

class UpsertResearchProjectAction
{
    public function execute(
        array $attributes,
        ?ResearchProject $record = null,
    ): ResearchProject {
        $record ??= new ResearchProject();
        $record->fill($attributes);
        $record->save();

        return $record;
    }
}
