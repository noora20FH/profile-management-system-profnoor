<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    protected $rootView = "app";
    public function share(Request $request): array
    {
        $profile = \App\Domains\Profile\Models\Profile::query()
            ->where('is_active', true)
            ->latest()
            ->first();

        return [
            ...parent::share($request),
            'appName'        => config('app.name'),
            'profile'        => $profile,
            'profileMetrics' => $profile?->hero_metrics ?? [],
        ];
    }
}
