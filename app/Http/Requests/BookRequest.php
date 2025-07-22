<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'published_date' => 'required|date',
            'isbn' => 'required|numeric|max:13|unique:books,isbn,',
            'category_id' => 'required|exists:categories,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'The title is required.',
            'title.max' => 'The title may not be greater than 255 characters.',
            'author.required' => 'The author is required.',
            'author.max' => 'The author may not be greater than 255 characters.',
            'published_date.required' => 'The published date is required.',
            'published_date.date' => 'The published date must be a valid date.',
            'isbn.required' => 'The ISBN is required.',
            'isbn.unique' => 'The ISBN must be unique.',
            'isbn.numeric' => 'The ISBN must be a valid number.',
            'category_id.exists' => 'The selected category does not exist.',
            'category_id.required' => 'The category ID is required.',
        ];
    }
}
