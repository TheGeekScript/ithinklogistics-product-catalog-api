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
            'name' => 'required|string|max:255',
            'parent_category_id' => 'nullable|exists:categories,id',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Category name is required.',
            'parent_category_id.exists' => 'The selected parent category does not exist.',
        ];
    }
}
