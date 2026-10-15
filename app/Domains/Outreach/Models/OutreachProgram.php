<?php

namespace App\Domains\Outreach\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class OutreachProgram extends Model
{
    use HasFactory;

    protected $table = "outreach_programs";

    protected $fillable = [
        "title",
        "slug",
        "category",
        "description",
        "year",
        "image_path",
        "primary_metric",
        "secondary_metric",
        "impact_url",
        "is_featured",
        "is_published",
        "sort_order",
        "video_url",
    ];

    protected function casts(): array
    {
        return [
            "is_featured"  => "boolean",
            "is_published" => "boolean",
        ];
    }

    public function getImageUrlAttribute(): ?string
    {
        if (! $this->image_path) {
            return null;
        }

        // Data lama: file fisik ada di public/assets/...
        if (str_starts_with($this->image_path, "assets/")) {
            return asset($this->image_path);
        }

        // Data baru hasil upload Filament ke disk "public"
        // -> http://127.0.0.1:8000/storage/images/outreach/xxx.JPG
        return Storage::disk("public")->url($this->image_path);
    }
}