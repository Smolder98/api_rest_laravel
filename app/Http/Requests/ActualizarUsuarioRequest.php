<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActualizarUsuarioRequest extends FormRequest
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
            // "idFirebase" => "required",
            // "name" => "required",
            // "lastname" => "required",
            // "numberAccount" => "required",
            // "phone" => "required",
            // "status" => "required",
            // "image" => "required",
            // "address" => "required",
            // "birthDate" => "required",
            // "carrera" => "required",
            "email" => "unique:users,email," . $this->route('user')->id,
            // "password" => "required"
        ];
    }
}
