<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['string', 'max:255'],
            'password'=>'confirmed|min:8',
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
        ];
    }

    public function messages(): array
    {
        return [
            'name.string' => 'O nome precisa ser expresso em caracteres literais',
            'name.max'=>'O máximo de caracteres é de 255',

            'password.confirmed'=>'As senhas não são iguais',
            'password.min'=>'A senha precisa ter no minimo 8 caracteres',

            'email.email' => 'O email não está seguindo o padrão comum, inclua "@"',
            'email.max'=>'O máximo de caracteres é de 255',

        ];
    }
}
