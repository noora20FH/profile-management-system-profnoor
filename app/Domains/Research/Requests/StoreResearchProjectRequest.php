<?php

namespace App\Domains\Research\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreResearchProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [];
    }
}
