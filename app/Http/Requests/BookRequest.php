<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
           'booktitle' => 'required|string|max:255',
        'bookauthor' => 'required|string|max:255',
        'bookedition' => 'required|string|max:255',
        'bookquantity' => 'required|integer|min:1',
        'is_active' => 'sometimes|boolean',
        'bookimage' => 'sometimes|file|image|max:2048',
        'category' => 'required|exists:categories,id',
    ];
    }
}
