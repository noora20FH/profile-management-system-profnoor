<?php

namespace App\Domains\Outreach\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOutreachProgramRequest extends FormRequest
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
