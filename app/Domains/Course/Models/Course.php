<?php

namespace App\Domains\Course\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = "courses";

    protected $fillable = [
        "code",
        "title",
        "slug",
        "description",
        "semester",
        "year",
        "image_path",
        "syllabus_url",
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
