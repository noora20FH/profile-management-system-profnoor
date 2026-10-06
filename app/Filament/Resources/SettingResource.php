<?php

namespace App\Filament\Resources;

use App\Domains\CMS\Models\Setting;
use App\Filament\Resources\SettingResource\Pages;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static ?string $recordTitleAttribute = "key";

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make("key")
                ->required()
                ->unique(ignoreRecord: true)
                ->maxLength(255),
            TextInput::make("group")
                ->required()
                ->default("general")
                ->maxLength(100),
            KeyValue::make("value")->columnSpanFull(),
            Toggle::make("is_public"),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("key")->searchable()->sortable(),
                TextColumn::make("group")->badge()->sortable(),
                IconColumn::make("is_public")->boolean(),
                TextColumn::make("updated_at")->dateTime()->sortable(),
            ])
            ->recordActions([EditAction::make()])
            ->toolbarActions([
                BulkActionGroup::make([DeleteBulkAction::make()]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            "index" => Pages\ListSettings::route("/"),
            "create" => Pages\CreateSetting::route("/create"),
            "edit" => Pages\EditSetting::route("/{record}/edit"),
        ];
    }
}
