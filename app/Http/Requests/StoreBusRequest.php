<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBusRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Set to true to allow all authenticated users
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'registration_number' => 'required|string|unique:buses',
            'type' => 'required|string',
            'driver_name' => 'required|string|max:255',
            'driver_contact' => 'required|string|max:20',
            'route_from' => 'required|string',
            'route_to' => 'required|string',
            'departure_time' => 'required|date_format:H:i',
        ];
    }
}
