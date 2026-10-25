<?php

namespace App\Domains\TrackRecord\Controllers;

use App\Domains\TrackRecord\Services\TrackRecordService;
use Illuminate\Routing\Controller;
use Inertia\Inertia;

class TrackRecordController extends Controller
{
    public function index(TrackRecordService $service)
    {
        return Inertia::render('TrackRecordPage', [
            'records' => $service->pageData()
        ]);
    }
}