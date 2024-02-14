<?php

namespace App\Http\Requests\Wines;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            "name" => ["required", "string", "unique:wines", "min:3", "max:255"],
            "discription" => ["nullable", "string", "min:3", "max:255"],
            "price" => ["required", "string", "min:1", "max:3"],
            "date" => ["required", "date"],
            "type_id" => ["required", "string"],
        ];
    }
}
