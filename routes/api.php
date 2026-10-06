<?php

use App\Domains\Consultation\Controllers\ConsultationController;
use App\Domains\Media\Controllers\MediaController;
use App\Domains\Publication\Controllers\PublicationController;
use Illuminate\Support\Facades\Route;

Route::get("/publications", [PublicationController::class, "index"]);
Route::get("/media", [MediaController::class, "index"]);
Route::post("/consultations", [ConsultationController::class, "store"]);
