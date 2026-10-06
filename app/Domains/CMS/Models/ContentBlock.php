<?php

namespace App\Domains\CMS\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentBlock extends Model
{
    use HasFactory;

    protected $table = "content_blocks";

    protected $fillable = [
        "key",
        "title",
        "content",
        "metadata",
        "is_published",
    ];

    protected function casts(): array
    {
        return [
            "metadata" => "array",
            "is_published" => "boolean",
        ];
    }
}
