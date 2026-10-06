<?php

namespace App\Domains\Consultation\Services;

use App\Domains\Consultation\Models\Consultation;

class ConsultationService
{
    public function create(array $attributes): Consultation
    {
        return Consultation::query()->create($attributes);
    }
}
