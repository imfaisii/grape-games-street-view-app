<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLocationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'Title' => ['required', 'string', 'max:255'],
            'imgUrl' => ['required', 'image'],
            'country' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'isFav' => ['required', 'boolean'],
            'category_id' => ['required', 'exists:categories,id'],
            'details' => ['required']
        ];
    }
}
