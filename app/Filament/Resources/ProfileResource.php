<?php

namespace App\Filament\Resources;

use App\Domains\Profile\Models\Profile;
use App\Filament\Resources\ProfileResource\Pages;
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

class ProfileResource extends Resource
{
    protected static ?string $model = Profile::class;

    protected static ?string $recordTitleAttribute = "name";

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make("name")->required()->maxLength(255),
            TextInput::make("title")->required()->maxLength(255),
            TextInput::make("email")->email()->maxLength(255),
            TextInput::make("phone")->tel()->maxLength(255),
            TextInput::make("institution")->maxLength(255),
            TextInput::make("photo_path")->label("Photo path")->maxLength(255),
            Textarea::make("hero_description")->rows(4)->columnSpanFull(),
            Textarea::make("biography")->rows(8)->columnSpanFull(),
            Toggle::make("is_active")->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("name")->searchable()->sortable(),
                TextColumn::make("title")->searchable(),
                TextColumn::make("institution")->searchable(),
                IconColumn::make("is_active")->boolean(),
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
            "index" => Pages\ListProfiles::route("/"),
            "create" => Pages\CreateProfile::route("/create"),
            "edit" => Pages\EditProfile::route("/{record}/edit"),
        ];
    }
}
