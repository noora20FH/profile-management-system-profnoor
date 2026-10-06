<?php

namespace App\Domains\Consultation\Controllers;

use App\Domains\Consultation\Requests\StoreConsultationRequest;
use App\Domains\Consultation\Resources\ConsultationResource;
use App\Domains\Consultation\Services\ConsultationService;

class ConsultationController
{
    public function store(
        StoreConsultationRequest $request,
        ConsultationService $consultations,
    ): ConsultationResource {
        return new ConsultationResource(
            $consultations->create($request->validated()),
        );
    }
}
