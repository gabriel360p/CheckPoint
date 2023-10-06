<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OpenSessaoRequest extends FormRequest
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
            'finalidades'=>'min:4|required',
            'categoria'=>'required',
            'projeto'=>'required',
            // 'abertura'=>'required',
        ];
    }

    public function messages(): array
    {
        return [
            'finalidades.required'=>'A sessão precisa ter finalidades definidas',

            'finalidades.min'=>'É necessário no minimo 4 caracteres',

            'categoria.required'=>'A sessão precisa ser afiliada a uma categoria',

            'projeto.required'=>'A sessão precisa ser afiliada a um projeto',

            // 'abertura.required'=>'É necessário inserir uma data de abertura da sessão',
        ];
    }
}
