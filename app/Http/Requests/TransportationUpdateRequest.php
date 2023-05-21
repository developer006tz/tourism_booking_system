<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransportationUpdateRequest extends FormRequest
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
            'type' => ['required', 'in:flight,bus,train,motorcycle,boat,ship'],
            'price' => ['required', 'numeric'],
            'distance_covered_in_km' => ['required', 'numeric'],
            'image' => ['nullable', 'image', 'max:1024'],
        ];
    }
}
