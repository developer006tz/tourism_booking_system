<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccomodationimagesUpdateRequest extends FormRequest
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
            'accomodations_id' => ['required', 'exists:accomodations,id'],
            'type' => ['nullable', 'in:food,room,bed,surroundings,other'],
            'image' => ['nullable', 'image', 'max:1024'],
            'description' => ['nullable', 'max:255', 'string'],
        ];
    }
}