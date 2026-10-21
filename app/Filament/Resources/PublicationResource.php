<?php

namespace App\Filament\Resources;

use App\Domains\Publication\Models\Publication;
use App\Filament\Resources\PublicationResource\Pages;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class PublicationResource extends Resource
{
    protected static ?string $model = Publication::class;

    protected static ?string $recordTitleAttribute = "title";

   // Opsional: icon menu

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make("title")
                ->required()
                ->maxLength(255)
                ->columnSpanFull(),
                
            TextInput::make("slug")
                ->required()
                ->unique(ignoreRecord: true)
                ->maxLength(255)
                ->helperText('Slug unik untuk URL publikasi (contoh: data-driven-academic-system).'),
                
            Select::make("research_project_id")
                ->label("Penelitian Terkait")
                ->relationship("researchProject", "title")
                ->searchable()
                ->preload()
                ->nullable(),
                
            Select::make("type")
                ->options(Publication::TYPES) // Menggunakan konstanta dari Model
                ->required()
                ->default('artikel_jurnal'),
                
            DatePicker::make("published_at")
                ->label("Tanggal Publikasi")
                ->displayFormat('d F Y'),
                
            TextInput::make("doi")
                ->label("DOI")
                ->maxLength(255),
                
            TextInput::make("url")
                ->label("URL Publikasi (Link Eksternal)")
                ->url()
                ->maxLength(255),
                
            TextInput::make("video_url")
                ->label("Video URL")
                ->url()
                ->nullable(),
                
            Textarea::make("abstract")
                ->label("Abstrak")
                ->rows(6)
                ->columnSpanFull(),
                
            Toggle::make("is_published")
                ->label("Publish")
                ->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("title")
                    ->searchable()
                    ->sortable()
                    ->wrap(),
                TextColumn::make("type")
                    ->label("Tipe")
                    ->formatStateUsing(fn (string $state): string => Publication::TYPES[$state] ?? $state)
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'artikel_jurnal', 'artikel_prosiding' => 'success',
                        'buku' => 'info',
                        'paten', 'hak_cipta' => 'warning',
                        default => 'gray',
                    })
                    ->sortable(),
                TextColumn::make("published_at")
                    ->label("Tanggal")
                    ->date()
                    ->sortable(),
                TextColumn::make("researchProject.title")
                    ->label("Penelitian Terkait")
                    ->limit(30)
                    ->toggleable(isToggledHiddenByDefault: true),
                IconColumn::make("is_published")
                    ->label("Publish")
                    ->boolean()
                    ->sortable(),
                TextColumn::make("created_at")
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort("published_at", "desc")
            ->filters([
                SelectFilter::make('type')
                    ->label('Filter Tipe Publikasi')
                    ->options(Publication::TYPES),
                TernaryFilter::make('is_published')
                    ->label('Status Publish'),
            ])
            ->recordActions([EditAction::make()])
            ->toolbarActions([
                BulkActionGroup::make([DeleteBulkAction::make()]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            "index" => Pages\ListPublications::route("/"),
            "create" => Pages\CreatePublication::route("/create"),
            "edit" => Pages\EditPublication::route("/{record}/edit"),
        ];
    }
}