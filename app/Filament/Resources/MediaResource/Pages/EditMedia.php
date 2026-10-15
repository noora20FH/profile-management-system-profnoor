<?php

namespace App\Filament\Resources\MediaResource\Pages;

use App\Filament\Resources\MediaResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Storage;

class EditMedia extends EditRecord
{
    protected static string $resource = MediaResource::class;

    protected function getHeaderActions(): array
    {
        return [DeleteAction::make()];
    }

    protected function mutateFormDataBeforeSave(array $data): array
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