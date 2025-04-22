<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSeatRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'bus_id' => 'required|exists:buses,id',
            'seat_number' => 'required|string|max:255',
            'status' => 'required|in:available,booked',
            'travel_date' => 'required|date',
            'seat_type' => 'required|string|max:255',
            'row' => 'nullable|integer',
            'column' => 'nullable|integer',
            'layout_position' => 'nullable|string|max:255',
        ];
    }
}
