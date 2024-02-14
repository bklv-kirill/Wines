<?php

namespace App\Http\Requests\Wines;

use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Type\Integer;

class IndexRequest extends FormRequest
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
            "name" => ["nullable", "string", "max:255"],
            "type" => ["nullable", "string", "in:0,1,2,3"],
            "order" => ["nullable", "string", "in:new,old,up,down"],
        ];
    }
}
