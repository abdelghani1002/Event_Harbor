<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
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
            'title' => 'required|string|min:3',
            'description' => 'required|string',
            'date' => 'required|date|after:now',
            'place' => 'required|string',
            'tickets_number' => 'required|integer|min:1',
            'ticket_price' => 'required|numeric|min:0',
            'photo' => 'bail|nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'reservation_type' => 'required|in:manual,automatic',
            'category_id' => 'required|exists:categories,id',
        ];
    }
}
