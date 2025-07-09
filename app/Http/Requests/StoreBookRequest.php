<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'titulo' => [
                'required',
                'string',
                'min:3',
                'max:255',
                Rule::unique('livros', 'titulo'),
            ],
            'sinopse' => [
                'required',
                'string',
                'min:3',
            ],
            'autor' => [
                'required',
                'string',
            ],
            'imagem' => [
                'string'
            ],
            'quantidade_total' => [
                'required',
                'integer',
                'min:1',
            ],
            'quantidade_disponivel' => [
                'required',
                'integer',
                'min:0',
            ],
        ];
    }
}
