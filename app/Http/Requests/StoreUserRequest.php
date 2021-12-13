<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name'      => 'required',
            'email'     => 'required|unique:users',
            'password'  => 'required|confirmed',
            'role'      => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'         => 'Ingrese el nombre del usuario',
            'email.required'        => 'Ingrese el correo electrónico del usuario',
            'email.unique'          => 'El correo electrónico ya esta en uso',
            'password.required'     => 'Ingrese la contraseña',
            'password.confirmed'    => 'Las contraseñas no coinciden',
            'role.required'         => 'Seleccione un rol para el usuario',
        ];
    }
}
