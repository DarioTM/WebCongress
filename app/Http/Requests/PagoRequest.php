<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PagoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function messages()
    {
        $required   =   'El campo :attribute es obligatorio';

        return [
                'iduser.required'           =>  $required,
                'documento.required'        =>$required,

        ];
    }

 
    public function rules()
    {
        return [
                'id'         =>  '',
                'iduser'        =>  'required',
                'documento'        =>  'required',
                'verificado'    =>  '',
        ];
    }
}
