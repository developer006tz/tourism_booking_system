<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ToursiteimagesUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'toursite_id' => ['required', 'exists:toursites,id'],
            'image' => ['nullable', 'array', 'max:1'],
            'image.*' => ['image', 'max:3024'],
            'description' => ['nullable', 'max:255', 'string'],
        ];
    }
}
