<?php

namespace App\Domains\Research\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    ];

    protected function casts(): array
    {
        return [
            "is_featured" => "boolean",
            "is_published" => "boolean",
        ];
    }
}
