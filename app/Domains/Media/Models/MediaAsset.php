<?php

namespace App\Domains\Media\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaAsset extends Model
{
    use HasFactory;

    protected $table = "media";

    protected $fillable = [
        "disk",
        "path",
        "filename",
        "mime_type",
        "size",
        "alt_text",
        "collection",
    ];

    protected function casts(): array
    {
        return [];
    }
}
