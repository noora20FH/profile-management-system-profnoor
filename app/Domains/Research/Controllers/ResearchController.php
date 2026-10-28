<?php

namespace App\Domains\Research\Controllers;

use App\Domains\Research\Models\ResearchProject;
use App\Domains\Research\Services\ResearchService;
use Inertia\Inertia;
use Inertia\Response;

class ResearchController
{
    public function index(ResearchService $research): Response
    {
        return Inertia::render("ResearchPage", [
            "page" => $research->pageData(),
        ]);
    }


}
