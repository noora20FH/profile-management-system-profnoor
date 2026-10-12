<?php

namespace App\Domains\Publication\Requests;


use Illuminate\Foundation\Http\FormRequest;



class StorePublicationRequest extends FormRequest
{


    public function authorize(): bool
    {
        return true;
    }



    public function rules(): array
    {


        return [


            "research_project_id" =>

            "nullable|exists:research_projects,id",



            "type" =>

            "required|
                in:book,journal,proceeding,patent,prototype,ttg",



            "title" =>

            "required|string|max:255",



            "slug" =>

            "required|string|max:255",



            "abstract" =>

            "nullable|string",



            "description" =>

            "nullable|string",



            "authors" =>

            "nullable|string",



            "publisher" =>

            "nullable|string|max:255",

            "published_at" =>

            "nullable|date",



            "doi" =>

            "nullable|string",



            "url" =>

            "nullable|url",



            "file" =>

            "nullable|
                file|
                max:10240",



            "thumbnail" =>

            "nullable|
                image|
                max:2048",


        ];
    }
}
