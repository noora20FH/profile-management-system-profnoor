<?php

namespace App\Filament\Resources;

use App\Domains\Research\Models\ResearchProject;
use App\Filament\Resources\ResearchResource\Pages;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ResearchResource extends Resource
{
    protected static ?string $model = ResearchProject::class;

    protected static ?string $recordTitleAttribute = "title";

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make("title")->required()->maxLength(255),
            TextInput::make("slug")
                ->required()
                ->unique(ignoreRecord: true)
                ->maxLength(255),
            TextInput::make("year")->required()->numeric()->minValue(1900),
            TextInput::make("funding_source")->maxLength(255),
            TextInput::make("image_path")->maxLength(255),
            TextInput::make("publication_url")->url()->maxLength(255),
            Textarea::make("summary")->required()->rows(8)->columnSpanFull(),
            TextInput::make("sort_order")->numeric()->default(0),
            Toggle::make("is_featured"),
            Toggle::make("is_published"),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("title")->searchable()->sortable()->wrap(),
                TextColumn::make("year")->sortable(),
                TextColumn::make("funding_source")->searchable()->toggleable(),
                IconColumn::make("is_featured")->boolean(),
                IconColumn::make("is_published")->boolean(),
                TextColumn::make("sort_order")->sortable(),
            ])
            ->defaultSort("year", "desc")
            ->recordActions([EditAction::make()])
            ->toolbarActions([
                BulkActionGroup::make([DeleteBulkAction::make()]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            "index" => Pages\ListResearch::route("/"),
            "create" => Pages\CreateResearch::route("/create"),
            "edit" => Pages\EditResearch::route("/{record}/edit"),
        ];
    }
}
