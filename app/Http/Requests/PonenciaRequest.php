<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PonenciaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function messages()
    {
        $required   =   'El campo :attribute es obligatorio';
        $min        =   'La longitud mínima del campo :attribute es :min';
        $max        =   'La longitud máxima del campo :attribute es :max';
        $date       =   'El varlo del campo :attribute tiene que ser del tipo fecha';

        
        
        return [
                'iduser.required'           =>  $required,
                
                'titulo.required'           =>$required,
                'titulo.max'                =>$max,
                'titulo.min'                =>$min,
                
                'video.required'      =>$required,
                'video.min'           =>$min,
    
                'fecha.date'                =>$date,
                
         
            

        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
                'iduser'        =>  'required',
                'titulo'        =>  'required|max:100|min:10',
                'video'         =>  'required|min:5',
                'fecha'         =>  'date'
        ];
    }
}
