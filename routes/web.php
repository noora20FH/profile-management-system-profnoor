<?php

use App\Domains\Course\Controllers\CourseController;
use App\Domains\Outreach\Controllers\OutreachController;
use App\Domains\Profile\Controllers\ProfileController;
use App\Domains\Research\Controllers\ResearchController;
use Illuminate\Support\Facades\Route;
use App\Domains\Publication\Controllers\PublicationController;

Route::get("/", ProfileController::class)->name("home");
Route::get("/penelitian", [ResearchController::class, "index"])->name(
    "research.index",
);
Route::get("/penelitian/{researchProject:slug}", [
    ResearchController::class,
    "show",
])->name("research.show");
Route::get("/mata-kuliah", [CourseController::class, "index"])->name(
    "courses.index",
);
Route::get("/pengabdian", [OutreachController::class, "index"])->name(
    "outreach.index",
);
Route::get("/publikasi",[PublicationController::class,"index"])->name(
    "publication.index"
);
