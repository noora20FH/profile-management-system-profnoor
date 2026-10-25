<?php

namespace App\Domains\TrackRecord\Services;

use App\Domains\TrackRecord\Models\TrackRecord;

class TrackRecordService
{
    public function pageData(): array
    {
        $records = TrackRecord::query()
            ->orderBy('sort_order')
            ->get()
            ->groupBy('type');

        return [
            'eyebrow'     => 'KREDENSIAL & PENGAKUAN',
            'title'       => 'Rekam Jejak Profesional',
            'description' => 'Kontribusi aktif dalam tata kelola akademik, evaluasi keilmuan, dan dedikasi di tingkat nasional maupun internasional.',
            'reviewers'   => $records->get('reviewer', []),
            'assessors'   => $records->get('assessor', []),
            'awards'      => $records->get('award', []),
        ];
    }
}