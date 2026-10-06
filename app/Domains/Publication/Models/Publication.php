<?php

namespace App\Domains\Publication\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;

    protected $table = "publications";

    protected $fillable = [
        "research_project_id",
        "title",
        "slug",
        "abstract",
        "journal",
        "published_at",
        "doi",
        "url",
        "is_published",
    ];

    protected function casts(): array
    {
        return [
            "published_at" => "datetime",
            "is_published" => "boolean",
        ];
    }
}
