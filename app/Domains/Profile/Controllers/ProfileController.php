<?php

namespace App\Domains\Profile\Controllers;

use App\Domains\Course\Services\CourseService;
use App\Domains\Outreach\Services\OutreachService;
use App\Domains\Profile\Services\ProfileService;
use App\Domains\Research\Services\ResearchService;
use App\Domains\Publication\Services\PublicationService;
use Inertia\Inertia;
use Inertia\Response;

class ProfileController
{
    public function __invoke(
        ProfileService $profiles,
        ResearchService $research,
        CourseService $courses,
        OutreachService $outreach,
        PublicationService $publication,
    ): Response {
        return Inertia::render("HomePage", [
            "profile"         => $profiles->current(),
            "profileMetrics"  => $profiles->metrics(),
            "research"        => $research->homepageData(3),    // ← 3 unggulan
            "courses"         => $courses->homepageData(3),     // ← 3 unggulan
            "outreach"        => $outreach->homepageData(3),    // ← 3 unggulan
            "publication"     => $publication->homepageData(3), // ← 3 unggulan
        ]);
    }

public function image($path)
{
    // Validasi apakah request berasal dari domain Anda sendiri (mencegah hotlinking)
    $referer = request()->headers->get('referer');
    $host = request()->getHost();
    
    // Jika referer kosong (akses langsung) atau bukan dari domain Anda
    if (!$referer || parse_url($referer, PHP_URL_HOST) !== $host) {
        abort(403, 'Unauthorized access');
    }

    $filePath = storage_path('app/public/' . $path);
    
    if (!file_exists($filePath)) {
        abort(404);
    }

    // Tampilkan gambar tanpa opsi attachment
    return response()->file($filePath, [
        'Content-Type' => mime_content_type($filePath),
        'Content-Disposition' => 'inline; filename="' . basename($filePath) . '"',
        'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
    ]);
}
}
