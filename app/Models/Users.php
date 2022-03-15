<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model{
    use HasFactory;

    protected $fillable = [
             "idFirebase",
            "name",
            "lastname",
            "numberAccount",
            "phone",
            "status",
            "image",
            "imageCover",
            "address",
            "birthDate",
            "carrera",
            "email",
            "password"
    ];


    protected $hidden = [
        'created_at',
        'updated_at'
    ];


     //Relacion uno a muchos
    public function groupsCreates(){
        return $this->hasMany(Group::class, 'user_id_created');
    }


    //Relacion de muchos a muchos
    public function groups(){
        return $this->belongsToMany(Group::class, "user_groups", "user_id", "group_id")->withPivot("status");
    }


}
