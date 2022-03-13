<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
             "id",
            "idFirebase",
            "title",
            "description",
            "image",
            "status",
            "user_id_created"    ];

        protected $hidden = [
        'created_at',
        'updated_at'
        ];


    //Relacion uno a muchos(inversa)
    public function userCreated(){
        return $this->belongsTo(Users::class, 'user_id_created');
    }

       //Relacion de muchos a muchos
    public function users(){
        return $this->belongsToMany(Users::class, "user_groups", "group_id", "user_id")->withPivot("status");
    }

}
