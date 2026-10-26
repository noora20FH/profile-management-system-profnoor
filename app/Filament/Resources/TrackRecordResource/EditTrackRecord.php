<?php

namespace App\Filament\Resources\TrackRecordResource\Pages;

use App\Filament\Resources\TrackRecordResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTrackRecord extends EditRecord
{
    protected static string $resource = TrackRecordResource::class;

    protected function getHeaderActions(): array
    {
        return [DeleteAction::make()];
    }
}