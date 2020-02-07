<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCongresoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function messages()
    {
        $required   =   'El campo :attribute es obligatorio';
        $email        =   'El campo :attribute tiene que ser tipo email';
        $date       =   'El varlo del campo :attribute tiene que ser del tipo fecha';
   

        
        
        return [
                'name.required'          =>  $required,
                
                'email.required'         =>$required,
                'titulo.email'           =>$email,
                
                'password.required'      =>$required,
                
                'type.required'          =>$date,
                
         
            

        ];
    }


    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'type'  =>  'required'
        ];
    }
}
