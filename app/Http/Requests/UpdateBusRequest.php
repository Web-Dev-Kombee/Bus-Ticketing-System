<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBusRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'registration_number' => [
                'required',
                'string',
                Rule::unique('buses', 'registration_number')->ignore($this->route('bus')->id),
            ],
            'type' => 'required|string',
            'driver_name' => 'required|string|max:255',
            'driver_contact' => 'required|string|max:20',
            'route_from' => 'required|string',
            'route_to' => 'required|string',
            'departure_time' => 'required|date_format:H:i',
        ];
    }
}
