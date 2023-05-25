<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingStoreRequest extends FormRequest
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
            'user_id' => ['required', 'exists:users,id'],
            'toursite_id' => ['required', 'exists:toursites,id'],
            'transportation_id' => ['nullable', 'exists:transportations,id'],
            'accomodations_id' => ['nullable', 'exists:accomodations,id'],
        ];
    }
}
