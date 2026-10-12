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

        "description",

        "authors",

        "publisher",

        "published_at",

        "doi",

        "url",

        "file_path",

        "file_name",

        "thumbnail",

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
     * Label jenis publikasi
     */
    public function getTypeLabelAttribute()
    {
        return match($this->type){

            "book" =>
                "Buku",

            "journal" =>
                "Jurnal",

            "proceeding" =>
                "Prosiding",

            "patent" =>
                "Paten",

            "prototype" =>
                "Prototipe",

            "ttg" =>
                "Teknologi Tepat Guna",

            default =>
                "Publikasi"

        };
    }
}