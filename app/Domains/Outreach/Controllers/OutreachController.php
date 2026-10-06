<?php

namespace App\Domains\Outreach\Controllers;

use App\Domains\Outreach\Services\OutreachService;
use Inertia\Inertia;
use Inertia\Response;

class OutreachController
{
    public function index(OutreachService $outreach): Response
    {
        return Inertia::render("OutreachPage", [
            "page" => $outreach->pageData(),
        ]);
    }
}
