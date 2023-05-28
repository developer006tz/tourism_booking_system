<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ToursiteStoreRequest extends FormRequest
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
            'name' => ['required', 'max:255', 'string'],
            'country_id' => ['required', 'exists:countries,id'],
            'other_name' => ['nullable', 'max:255', 'string'],
            'description' => ['nullable', 'string'],
            'accomodation' => ['nullable', 'string'],
            'region' => ['nullable', 'max:255', 'string'],
            'district' => ['nullable', 'max:255', 'string'],
            'distance' => ['nullable', 'numeric'],
            'attractions' => ['nullable', 'string'],
            'local_price' => ['nullable', 'numeric'],
            'international_price' => ['nullable', 'numeric'],
            'time_of_visit' => ['nullable', 'string'],
        ];
    }
}
