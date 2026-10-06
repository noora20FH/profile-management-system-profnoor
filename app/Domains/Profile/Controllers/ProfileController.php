<?php

namespace App\Domains\Profile\Controllers;

use App\Domains\Course\Services\CourseService;
use App\Domains\Outreach\Services\OutreachService;
use App\Domains\Profile\Services\ProfileService;
use App\Domains\Research\Services\ResearchService;
use Inertia\Inertia;
use Inertia\Response;

class ProfileController
{
    public function __invoke(
        ProfileService $profiles,
        ResearchService $research,
        CourseService $courses,
        OutreachService $outreach,
    ): Response {
        return Inertia::render("HomePage", [
            "profile" => $profiles->current(),
            "profileMetrics" => $profiles->metrics(),
            "research" => $research->pageData(),
            "courses" => $courses->pageData(),
            "outreach" => $outreach->pageData(),
        ]);
    }
}
