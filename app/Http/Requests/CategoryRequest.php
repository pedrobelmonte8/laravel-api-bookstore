<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:500',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The category name is required.',
            'name.max' => 'The category name may not be greater than 255 characters.',
            'description.required' => 'The category description is required.',
            'description.max' => 'The description may not be greater than 500 characters.',
        ];
    }
}
