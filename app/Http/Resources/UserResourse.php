<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResourse extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);

        //Con este codigo yo elijo que mandar  y aqui puede hacer tratamiento de la data, como poner todo en mayuscula
        // return [
        //     "id" => $this->id
        // ];

    }

    //Metodo para agregar un atributo mas al json
    public function with($request)
    {
            return [
                'res' => true
            ];
    }
}
