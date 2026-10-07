<?php

namespace App\Filament\Resources;

use App\Domains\Outreach\Models\OutreachProgram;
use App\Filament\Resources\OutreachResource\Pages;
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

class OutreachResource extends Resource
{
    protected static ?string $model = OutreachProgram::class;

    protected static ?string $recordTitleAttribute = "title";

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make("title")->required()->maxLength(255),
            TextInput::make("slug")
                ->required()
                ->unique(ignoreRecord: true)
                ->maxLength(255),
            TextInput::make("category")->maxLength(255),
            TextInput::make("year")->required()->maxLength(20),
            TextInput::make("image_path")->maxLength(255),
            TextInput::make("primary_metric")->maxLength(255),
            TextInput::make("secondary_metric")->maxLength(255),
            TextInput::make('impact_url')
                ->label('Impact Documentation URL')
                ->url()
                ->nullable(),
            Textarea::make("description")
                ->required()
                ->rows(8)
                ->columnSpanFull(),
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
                TextColumn::make("category")->searchable(),
                TextColumn::make("year")->sortable(),
                IconColumn::make("is_featured")->boolean(),
                IconColumn::make("is_published")->boolean(),
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
            "index" => Pages\ListOutreach::route("/"),
            "create" => Pages\CreateOutreach::route("/create"),
            "edit" => Pages\EditOutreach::route("/{record}/edit"),
        ];
    }
}
