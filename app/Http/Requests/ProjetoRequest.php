<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjetoRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [

            'nome'=>'min:4',
            'descricao'=>'min:4',

        ];
    }

    public function messages(): array
    {
        return [

            'nome.min'=>'O nome do projeto precisa no minimo 4 caracteres',
            'descricao.min'=>'A descrição precisa no minimo de 4 caracteres',

        ];
    }

}
