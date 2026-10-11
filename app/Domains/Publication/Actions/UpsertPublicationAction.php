<?php


namespace App\Domains\Publication\Actions;


use App\Domains\Publication\Models\Publication;
use Illuminate\Support\Facades\Storage;



class UpsertPublicationAction
{


    public function execute(

        array $attributes,

        ?Publication $record = null

    ): Publication {


        $record ??= new Publication();



        /**
         * Upload file publikasi
         */

        if(
            isset($attributes["file"])
        ){

            $file =
                $attributes["file"];



            $path =
                $file->store(
                    "publications",
                    "public"
                );


            $attributes["file_path"] =
                $path;


            $attributes["file_name"] =
                $file->getClientOriginalName();



            unset(
                $attributes["file"]
            );

        }



        /**
         * Upload thumbnail
         */

        if(
            isset($attributes["thumbnail"])
        ){

            $attributes["thumbnail"] =
                $attributes["thumbnail"]
                ->store(
                    "publications/thumbnails",
                    "public"
                );

        }



        $record->fill(
            $attributes
        );


        $record->save();



        return $record;

    }


}