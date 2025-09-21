<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // পরে authorization logic দিতে পারো
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        // route model binding থেকে category আনা হয়েছে
        $categoryId = $this->route('category')->id ?? null;

        return [
            'name' => 'required|string|max:255|unique:categories,name,' . $categoryId,
        ];
    }
}
