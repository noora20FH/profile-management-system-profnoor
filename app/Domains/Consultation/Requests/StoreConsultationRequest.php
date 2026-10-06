<?php

namespace App\Domains\Consultation\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreConsultationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "name" => ["required", "string", "max:255"],
            "email" => ["required", "email", "max:255"],
            "topic" => ["nullable", "string", "max:255"],
            "message" => ["nullable", "string", "max:5000"],
            "preferred_at" => ["nullable", "date", "after:now"],
        ];
    }
}
