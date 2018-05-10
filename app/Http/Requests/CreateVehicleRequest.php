<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateVehicleRequest extends FormRequest
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
            'registration_tag' => 'required|max:6',
        ];
    }

    public function messages(){
        return [
            'registration_tag.required' => 'Debe ingresar el número de la placa del vehículo',
            'registration_tag.max'      => 'El número de placa es de máximo 6 caracteres (ingresar solo letras y numeros)',
        ];
    }
}
