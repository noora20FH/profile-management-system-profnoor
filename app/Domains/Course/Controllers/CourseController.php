<?php

namespace App\Domains\Course\Controllers;

use App\Domains\Course\Services\CourseService;
use Inertia\Inertia;
use Inertia\Response;

class CourseController
{
    public function index(CourseService $courses): Response
    {
        return Inertia::render("CoursesPage", [
            "page" => $courses->pageData(),
        ]);
    }
}
