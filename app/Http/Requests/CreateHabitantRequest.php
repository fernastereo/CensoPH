<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateHabitantRequest extends FormRequest
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
            'email' => 'sometimes|nullable|email|max:200|unique:habitants',
            'occupation' => 'max:50',
            'cellphone_number' => 'max:25',
            'relationship_id' => 'required',
            'idnumber' => 'sometimes|nullable|numeric|min:0',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Debe ingresar al menos un nombre',
            'name.max' => 'El nombre es de máximo 200 caracteres',
            'email.email' => 'Formato de correo no válido',
            'email.unique' => 'El correo suministrado ya fue usado',
            'occupation.max' => 'La ocupación es de máximo 50 caracteres',
            'idnumber.numeric' => 'El número de identificación debe ser numérico',
            'relationship_id.required' => 'Debe escoger una relación de la lista',
        ];
    }
}
