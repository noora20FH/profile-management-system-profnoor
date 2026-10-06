<?php

namespace App\Filament\Resources;

use App\Domains\CMS\Models\ContentBlock;
use App\Filament\Resources\ContentBlockResource\Pages;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ContentBlockResource extends Resource
{
    protected static ?string $model = ContentBlock::class;

    protected static ?string $recordTitleAttribute = "key";

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make("key")
                ->required()
                ->unique(ignoreRecord: true)
                ->maxLength(255),
            TextInput::make("title")->maxLength(255),
            Textarea::make("content")->rows(12)->columnSpanFull(),
            KeyValue::make("metadata")->columnSpanFull(),
            Toggle::make("is_published"),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("key")->searchable()->sortable(),
                TextColumn::make("title")->searchable(),
                IconColumn::make("is_published")->boolean(),
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
            "index" => Pages\ListContentBlocks::route("/"),
            "create" => Pages\CreateContentBlock::route("/create"),
            "edit" => Pages\EditContentBlock::route("/{record}/edit"),
        ];
    }
}
