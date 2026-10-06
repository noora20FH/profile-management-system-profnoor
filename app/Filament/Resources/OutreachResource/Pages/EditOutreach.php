<?php

namespace App\Filament\Resources\OutreachResource\Pages;

use App\Filament\Resources\OutreachResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditOutreach extends EditRecord
{
    protected static string $resource = OutreachResource::class;

    protected function getHeaderActions(): array
    {
        return [DeleteAction::make()];
    }
}
