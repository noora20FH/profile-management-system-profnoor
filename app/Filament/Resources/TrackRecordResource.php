<?php

namespace App\Filament\Resources;

use App\Domains\TrackRecord\Models\TrackRecord;
use App\Filament\Resources\TrackRecordResource\Pages;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TrackRecordResource extends Resource
{
    protected static ?string $model = TrackRecord::class;

    protected static ?string $recordTitleAttribute = "title";

    // Label untuk navigasi sidebar
    protected static ?string $navigationLabel = "Rekam Jejak";
    protected static ?string $modelLabel = "Rekam Jejak";

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Select::make("type")
                ->label("Kategori")
                ->options([
                    "reviewer" => "Reviewer Jurnal",
                    "assessor" => "Asesor",
                    "award" => "Penghargaan",
                ])
                ->required()
                ->native(false),

            TextInput::make("title")
                ->label("Nama Jurnal / Bidang / Penghargaan")
                ->required()
                ->maxLength(255)
                ->columnSpanFull(),

            TextInput::make("institution")
                ->label("Institusi Penyelenggara / Pemberi")
                ->maxLength(255),

            TextInput::make("scope")
                ->label("Skala (Khusus Reviewer)")
                ->maxLength(255)
                ->placeholder("Contoh: Internasional / Nasional"),

            TextInput::make("details")
                ->label("Keterangan Tambahan (Khusus Penghargaan)")
                ->maxLength(255)
                ->placeholder("Contoh: Tanda Kehormatan / Piagam"),

            TextInput::make("year")
                ->label("Tahun")
                ->numeric()
                ->maxLength(4)
                ->placeholder("Contoh: 2024"),

            TextInput::make("sort_order")
                ->label("Urutan Tampil")
                ->numeric()
                ->default(0)
                ->helperText("Angka kecil akan tampil lebih atas."),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("type")
                    ->label("Kategori")
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        "reviewer" => "info",
                        "assessor" => "warning",
                        "award" => "success",
                        default => "gray",
                    })
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        "reviewer" => "Reviewer Jurnal",
                        "assessor" => "Asesor",
                        "award" => "Penghargaan",
                        default => $state,
                    })
                    ->sortable(),
                TextColumn::make("title")
                    ->label("Nama / Judul")
                    ->searchable()
                    ->sortable()
                    ->wrap(),
                TextColumn::make("institution")
                    ->label("Institusi")
                    ->searchable()
                    ->wrap()
                    ->toggleable(),
                TextColumn::make("year")
                    ->label("Tahun")
                    ->sortable(),
                TextColumn::make("sort_order")
                    ->label("Urutan")
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort("sort_order", "asc")
            ->recordActions([EditAction::make()])
            ->toolbarActions([
                BulkActionGroup::make([DeleteBulkAction::make()]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            "index" => Pages\ListTrackRecords::route("/"),
            "create" => Pages\CreateTrackRecord::route("/create"),
            "edit" => Pages\EditTrackRecord::route("/{record}/edit"),
        ];
    }
}