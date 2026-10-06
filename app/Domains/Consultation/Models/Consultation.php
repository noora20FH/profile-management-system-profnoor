<?php

namespace App\Domains\Consultation\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    protected $table = "consultations";

    protected $fillable = [
        "name",
        "email",
        "topic",
        "message",
        "preferred_at",
        "status",
    ];

    protected function casts(): array
    {
        return [
            "preferred_at" => "datetime",
        ];
    }
}
