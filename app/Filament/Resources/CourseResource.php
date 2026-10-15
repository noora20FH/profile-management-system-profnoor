<?php

namespace App\Filament\Resources;

use App\Domains\Course\Models\Course;
use App\Filament\Resources\CourseResource\Pages;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CourseResource extends Resource
{
    protected static ?string $model = Course::class;

    protected static ?string $recordTitleAttribute = "title";

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make("code")
                ->required()
                ->unique(ignoreRecord: true)
                ->maxLength(50),
            TextInput::make("title")->required()->maxLength(255),
            TextInput::make("slug")
                ->required()
                ->unique(ignoreRecord: true)
                ->maxLength(255),
            TextInput::make("semester")->required()->maxLength(100),
            TextInput::make("year")->required()->numeric()->minValue(1900),

            FileUpload::make("image_path")
                ->label("Gambar Mata Kuliah")
                ->image()
                ->disk("public")
                ->directory("images/courses")
                ->visibility("public")
                ->maxSize(2048)
                ->acceptedFileTypes(["image/jpeg", "image/png", "image/webp"])
                ->imageEditor()
                ->columnSpanFull(),

            TextInput::make("syllabus_url")->url()->maxLength(255),
            Textarea::make("description")
                ->required()
                ->rows(7)
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
                TextColumn::make("code")->searchable()->sortable(),
                TextColumn::make("title")->searchable()->sortable()->wrap(),
                TextColumn::make("semester"),
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
            "index" => Pages\ListCourses::route("/"),
            "create" => Pages\CreateCourse::route("/create"),
            "edit" => Pages\EditCourse::route("/{record}/edit"),
        ];
    }
}