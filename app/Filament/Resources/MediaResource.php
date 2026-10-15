<?php

namespace App\Filament\Resources;

use App\Domains\Media\Models\MediaAsset;
use App\Filament\Resources\MediaResource\Pages;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class MediaResource extends Resource
{
    protected static ?string $model = MediaAsset::class;

    protected static ?string $recordTitleAttribute = "filename";

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            FileUpload::make("path")
                ->required()
                ->disk("public")
                ->directory("media")
                ->storeFileNamesIn("filename")
                ->columnSpanFull(),
            TextInput::make("alt_text")->maxLength(255),
            TextInput::make("collection")
                ->required()
                ->default("default")
                ->maxLength(100),
            TextInput::make("disk")->required()->default("public"),
            // mime_type dan size diisi otomatis oleh Create/Edit page
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("filename")->searchable()->sortable(),
                TextColumn::make("collection")->badge()->sortable(),
                TextColumn::make("mime_type")->toggleable(),
                TextColumn::make("size")->numeric()->toggleable(),
                TextColumn::make("created_at")->dateTime()->sortable(),
            ])
            ->recordActions([EditAction::make()])
            ->toolbarActions([
                BulkActionGroup::make([DeleteBulkAction::make()]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            "index" => Pages\ListMedia::route("/"),
            "create" => Pages\CreateMedia::route("/create"),
            "edit" => Pages\EditMedia::route("/{record}/edit"),
        ];
    }
}