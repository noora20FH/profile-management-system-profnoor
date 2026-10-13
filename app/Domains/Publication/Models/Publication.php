<?php

namespace App\Domains\Publication\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Domains\Research\Models\ResearchProject;

class Publication extends Model
{
    use HasFactory;


    protected $table = "publications";


    protected $fillable = [

        "research_project_id",

        "type",

        "title",

        "slug",

        "abstract",

        "published_at",

        "doi",

        "url",

        "video_url",

        "is_published",

    ];



    protected function casts(): array
    {
        return [

            "published_at" => "date",

            "is_published" => "boolean",

        ];
    }



    /**
     * Publication belongs to Research Project
     */
    public function researchProject()
    {
        return $this->belongsTo(
            ResearchProject::class,
            "research_project_id"
        );
    }



    /**
     * Available publication types
     */
    public const TYPES = [

        "artikel_jurnal" => "Artikel Jurnal",

        "artikel_prosiding" => "Artikel Prosiding",

        "paten" => "Paten",

        "hak_cipta" => "Hak Cipta",

        "prototipe" => "Prototipe",

        "ttg" => "Teknologi Tepat Guna (TTG)",

        "buku" => "Buku",

    ];



    /**
     * Display label for publication type
     */
    public function getTypeLabelAttribute()
    {
        return self::TYPES[$this->type] ?? "Publikasi";
    }



    /**
     * Filter by publication type
     */
    public function scopeByType($query, $type)
    {
        return $query->when(
            $type,
            fn($q) => $q->where('type', $type)
        );
    }
}
