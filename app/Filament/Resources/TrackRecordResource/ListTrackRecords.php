<?php

namespace App\Filament\Resources\TrackRecordResource\Pages;

use App\Filament\Resources\TrackRecordResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTrackRecords extends ListRecords
{
    protected static string $resource = TrackRecordResource::class;

    protected function getHeaderActions(): array
    {
        return [CreateAction::make()];
    }
}