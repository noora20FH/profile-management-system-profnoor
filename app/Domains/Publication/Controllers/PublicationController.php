<?php

namespace App\Domains\Publication\Controllers;

use App\Domains\Publication\Resources\PublicationResource;
use App\Domains\Publication\Services\PublicationService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PublicationController
{
    public function index(
        PublicationService $publications,
    ): AnonymousResourceCollection {
        return PublicationResource::collection($publications->published());
    }
}
