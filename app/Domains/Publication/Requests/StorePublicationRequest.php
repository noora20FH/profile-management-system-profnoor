<?php

namespace App\Domains\Publication\Requests;

use App\Domains\Publication\Models\Publication;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePublicationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "research_project_id" => [
                "nullable",
                "integer",
                "exists:research_projects,id",
            ],

            "type" => [
                "required",
                "string",
                Rule::in(array_keys(Publication::TYPES)),
            ],

            "title" => [
                "required",
                "string",
                "max:255",
            ],

            "slug" => [
                "required",
                "string",
                "max:255",
            ],

            "abstract" => [
                "nullable",
                "string",
            ],

            "description" => [
                "nullable",
                "string",
            ],

            "authors" => [
                "nullable",
                "string",
            ],

            "publisher" => [
                "nullable",
                "string",
                "max:255",
            ],

            "published_at" => [
                "nullable",
                "date",
            ],

            "doi" => [
                "nullable",
                "string",
            ],

            "url" => [
                "nullable",
                "url",
            ],

            "file" => [
                "nullable",
                "file",
                "max:10240",
            ],

            "thumbnail" => [
                "nullable",
                "image",
                "max:2048",
            ],
        ];
    }
}