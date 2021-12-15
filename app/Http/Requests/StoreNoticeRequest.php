<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNoticeRequest extends FormRequest
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
            'title' => 'required',
            'body'  => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required'    => 'Ingrese un título para la noticia',
            'body.required'     => 'Ingrese el contenido de la noticia'
        ];
    }
}
