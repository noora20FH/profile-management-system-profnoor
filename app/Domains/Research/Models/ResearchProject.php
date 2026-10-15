<?php

namespace App\Domains\Research\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ResearchProject extends Model
{
    use HasFactory;

    protected $table = "research_projects";

    protected $fillable = [
        "title",
        "slug",
        "summary",
        "year",
        "funding_source",
        "image_path",
        "publication_url",
        "is_featured",
        "is_published",
        "sort_order",
        "video_url",
    ];

    protected function casts(): array
    {
        return [
            "is_featured" => "boolean",
            "is_published" => "boolean",
        ];
    }

    public function getImageUrlAttribute(): ?string
    {
        if (!$this->image_path) {
            return null;
        }

        // Jika data lama masih ada di folder public/assets
        if (str_starts_with($this->image_path, 'assets/')) {
            return asset($this->image_path);
        }

        // Untuk data baru yang di-upload melalui Filament ke disk public
        return Storage::url($this->image_path, 'public');
    }
}
