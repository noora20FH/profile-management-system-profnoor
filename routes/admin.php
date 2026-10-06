<?php

use App\Domains\CMS\Controllers\CmsController;
use Illuminate\Support\Facades\Route;

Route::get("/content", [CmsController::class, "index"])->name("content.index");
