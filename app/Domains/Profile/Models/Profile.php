<?php

namespace App\Domains\Profile\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $table = "profiles";

    protected $fillable = [
        "name",
        "title",
        "email",
        "phone",
        "institution",
        "biography",
        "hero_description",
        "photo_path",
        "is_active",
    ];

    protected function casts(): array
    {
        return [
            "is_active" => "boolean",
        ];
    }
}
