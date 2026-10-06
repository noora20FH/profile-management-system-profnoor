<?php

namespace App\Filament\Resources\OutreachResource\Pages;

use App\Filament\Resources\OutreachResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListOutreach extends ListRecords
{
    protected static string $resource = OutreachResource::class;

    protected function getHeaderActions(): array
    {
        return [CreateAction::make()];
    }
}
