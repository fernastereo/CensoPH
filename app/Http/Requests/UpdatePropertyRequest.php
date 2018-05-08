<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePropertyRequest extends FormRequest
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
            'phone_number'  => 'string|max:255',
            'rent_agency'   => 'string|max:255',
            'idnumber'      => 'string|max:255',
            'coefficient'   => 'numeric|min:0',
            'area'          => 'numeric|min:0',
        ];
    }

    public function messages(){
        return [
            // 'idnumber.max'              => 'Matrícula Inmobiliaria tiene máximo 255 caracteres',
            'coefficient.numeric'       => 'El valor del Coeficiente no es válido',
            'coefficient.min'           => 'El valor del Coeficiente es minimo 0',
            'area.numeric'              => 'El valor del Area no es válido',
            'area.min'                  => 'El valor del Area es minimo 0',
        ];
    }
}
