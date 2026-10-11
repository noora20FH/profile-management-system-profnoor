<?php

namespace App\Domains\Publication\Controllers;


use Inertia\Inertia;

use App\Domains\Publication\Services\PublicationService;
use App\Domains\Publication\Models\Publication;


class PublicationController
{
    protected PublicationService $publicationService;

    public function __construct(PublicationService $publicationService)
    {
        $this->publicationService = $publicationService;
    }

    public function index()
    {
        return Inertia::render(
            'PublicationPage',
            [
                'publication' =>
                    $this->publicationService->pageData()
            ]
        );
    }


}
