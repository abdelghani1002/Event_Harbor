<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class UpdateEventRequest extends FormRequest
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
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'string|min:3',
            'description' => 'string',
            'date' => 'date|after:now',
            'place' => 'string',
            'status' => 'in:pending,rejected,published',
            'tickets_number' => 'integer|min:1',
            'ticket_price' => 'numeric|min:0',
            'photo' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'reservation_type' => 'in:manual,automatic',
            'category_id' => 'exists:categories,id',
        ];
    }
}
