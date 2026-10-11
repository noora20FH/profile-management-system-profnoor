<?php

namespace App\Domains\Publication\Resources;


use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;



class PublicationResource extends JsonResource
{


    public function toArray(
        Request $request
    ): array
    {


        return [


            "id" =>
                $this->id,


            "type" =>
                $this->type,


            "type_label" =>
                $this->type_label,


            "title" =>
                $this->title,


            "slug" =>
                $this->slug,


            "abstract" =>
                $this->abstract,


            "description" =>
                $this->description,


            "authors" =>
                $this->authors,


            "publisher" =>
                $this->publisher,


            "journal" =>
                $this->journal,


            "published_at" =>
                $this->published_at,


            "doi" =>
                $this->doi,


            "url" =>
                $this->url,


            "file_url" =>
                $this->file_path
                ?
                asset(
                    "storage/".$this->file_path
                )
                :
                null,


            "thumbnail" =>
                $this->thumbnail
                ?
                asset(
                    "storage/".$this->thumbnail
                )
                :
                null,


            "research_project" =>

                $this->when(

                    $this->researchProject,

                    [

                        "id" =>
                        $this->researchProject->id,


                        "title" =>
                        $this->researchProject->title,

                    ]

                ),


        ];

    }

}