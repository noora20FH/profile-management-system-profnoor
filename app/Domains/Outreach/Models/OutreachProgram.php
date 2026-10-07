<?php

namespace App\Domains\Outreach\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    ];

    protected function casts(): array
    {
        return [
            "is_featured" => "boolean",
            "is_published" => "boolean",
        ];
    }
}
