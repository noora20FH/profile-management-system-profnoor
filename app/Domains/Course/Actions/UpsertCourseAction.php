<?php

namespace App\Domains\Course\Actions;

use App\Domains\Course\Models\Course;

class UpsertCourseAction
{
    public function execute(array $attributes, ?Course $record = null): Course
    {
        $record ??= new Course();
        $record->fill($attributes);
        $record->save();

        return $record;
    }
}
