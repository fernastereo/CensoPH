<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePetRequest extends FormRequest
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
            'name' => 'required|max:200',
            'breed' => 'required|max:200',
            'animal_id' => 'required',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Debe ingresar al menos un nombre',
            'name.max' => 'El nombre es de máximo 200 caracteres',
            'breed.required' => 'Debe ingresar al menos una Raza',
            'breed.max' => 'La Raza es de máximo 200 caracteres',
            'animal_id.required' => 'Debe escoger un Tipo de Mascota de la lista',
        ];
    }    
}
