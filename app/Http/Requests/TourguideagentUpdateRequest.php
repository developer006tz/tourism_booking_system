<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TourguideagentUpdateRequest extends FormRequest
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
            'toursite_id' => ['nullable', 'exists:toursites,id'],
            'title' => ['required', 'max:255', 'string'],
            'description' => ['nullable', 'max:255', 'string'],
            'guide_price_per_day' => ['nullable', 'numeric'],
            'rating' => ['nullable', 'numeric'],
            'distance_covered' => ['nullable', 'numeric'],
            'user_id' => ['required', 'exists:users,id'],
        ];
    }
}
