<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActualizarGrupoRequest extends FormRequest
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
            "id" => "required",
            "idFirebase" => "required",
            "title" => "required",
            "description" => "required",
            "image" => "required",
            "status" => "required",
            "user_id_created" => "required"
        ];
    }
}
