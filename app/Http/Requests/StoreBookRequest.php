<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
            'title' => 'required',
            'genre' => 'required',
            'image' => 'nullable|mimes:png,jpg,jpeg|max:1024',
            'pages' => 'nullable',
            'description' => 'nullable',
            'year' => 'nullable|date',
            'price' => 'required|integer',
            'author_id' => 'required',
            'uri' => 'nullable',
        ];
    }
}
