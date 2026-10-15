<?php

namespace App\Filament\Resources\MediaResource\Pages;

use App\Filament\Resources\MediaResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Storage;

class CreateMedia extends CreateRecord
{
    protected static string $resource = MediaResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (!empty($data['path'])) {
            $disk = $data['disk'] ?? 'public';

            $data['mime_type'] = Storage::disk($disk)->mimeType($data['path']);
            $data['size'] = Storage::disk($disk)->size($data['path']);
            $data['filename'] = basename($data['path']);
        }

        return $data;
    }
}