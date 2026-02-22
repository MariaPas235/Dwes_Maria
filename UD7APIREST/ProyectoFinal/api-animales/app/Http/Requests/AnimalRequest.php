<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnimalRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; 
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:100',
            'age' => 'required|integer|min:0',
            'owner_email' => 'required|email',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048' 
        ];
    }
}