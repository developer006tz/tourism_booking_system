<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccomodationsStoreRequest extends FormRequest
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
            'name' => ['required', 'max:255', 'string'],
            'type' => [
                'required',
                'in:hotel,restaurant,motel,lodge,resort,other',
            ],
            'sleep_service' => ['nullable', 'in:yes,no'],
            'description' => ['nullable', 'max:255', 'string'],
            'local_night_fee' => ['nullable', 'numeric'],
            'international_night_fee' => ['nullable', 'numeric'],
            'food_service' => ['nullable', 'in:yes,no'],
            'food_types_and_price' => ['nullable', 'max:255', 'string'],
            'is_inside_park' => ['nullable', 'in:yes,no'],
            'distance_to_tour_site' => ['nullable', 'numeric'],
            'room_available' => ['nullable', 'numeric'],
        ];
    }
}
