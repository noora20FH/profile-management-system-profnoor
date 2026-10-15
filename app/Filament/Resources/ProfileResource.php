<?php

namespace App\Filament\Resources;

use App\Domains\Profile\Models\Profile;
use App\Filament\Resources\ProfileResource\Pages;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProfileResource extends Resource
{
    protected static ?string $model = Profile::class;

    protected static ?string $recordTitleAttribute = "name";

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Identitas Dasar')->schema([
                TextInput::make('name')->required()->maxLength(255),
                TextInput::make('title')->required()->maxLength(255),
                TextInput::make('status_pill')
                    ->label('Status Pill (Hero)')
                    ->maxLength(255)
                    ->helperText('Contoh: KETUA ILMU & TEKNIK KOMPUTER'),
                TextInput::make('email')->email()->maxLength(255),
                TextInput::make('phone')->tel()->maxLength(255),
                TextInput::make('institution')->maxLength(255),
            ])->columns(2),

            Section::make('Hero Section')->schema([
                Textarea::make('hero_description')->rows(4)->columnSpanFull(),
                FileUpload::make('hero_photo_path')
                    ->label('Foto Hero')
                    ->image()
                    ->disk('public')
                    ->directory('images/profiles')
                    ->visibility('public')
                    ->maxSize(2048)
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                    ->imageEditor(),
                FileUpload::make('photo_path')
                    ->label('Foto Utama (fallback hero)')
                    ->image()
                    ->disk('public')
                    ->directory('images/profiles')
                    ->visibility('public')
                    ->maxSize(2048)
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp']),

                TextInput::make('hero_cta_primary_label')->maxLength(255),
                TextInput::make('hero_cta_primary_url')->maxLength(255),
                TextInput::make('hero_cta_secondary_label')->maxLength(255),

                Repeater::make('hero_metrics')
                    ->label('Hero Metrics')
                    ->schema([
                        TextInput::make('value')->required(),
                        TextInput::make('label')->required(),
                        Textarea::make('detail')->rows(2),
                    ])
                    ->columns(1)
                    ->columnSpanFull(),
            ])->columns(2),

            Section::make('Biography Section')->schema([
                FileUpload::make('biography_photo_path')
                    ->label('Foto Biografi')
                    ->image()
                    ->disk('public')
                    ->directory('images/profiles')
                    ->visibility('public')
                    ->maxSize(2048)
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                    ->imageEditor(),

                TextInput::make('biography_eyebrow')->maxLength(255),
                TextInput::make('biography_title')->maxLength(255),

                Repeater::make('biography_paragraphs')
                    ->label('Paragraf Biografi')
                    ->simple(
                        Textarea::make('paragraph')->rows(3)->required()
                    )
                    ->columnSpanFull(),

                Repeater::make('qualifications')
                    ->label('Kualifikasi')
                    ->schema([
                        TextInput::make('degree')->required(),
                        TextInput::make('institution')->required(),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),

                TagsInput::make('expertise_tags')
                    ->label('Bidang Keahlian')
                    ->columnSpanFull(),

                Toggle::make('is_active')->default(true),
            ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable()->sortable(),
                TextColumn::make('title')->searchable(),
                TextColumn::make('institution')->searchable(),
                IconColumn::make('is_active')->boolean(),
                TextColumn::make('updated_at')->dateTime()->sortable(),
            ])
            ->recordActions([EditAction::make()])
            ->toolbarActions([
                BulkActionGroup::make([DeleteBulkAction::make()]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListProfiles::route('/'),
            'create' => Pages\CreateProfile::route('/create'),
            'edit'   => Pages\EditProfile::route('/{record}/edit'),
        ];
    }
}