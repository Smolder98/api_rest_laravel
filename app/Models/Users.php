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
}
