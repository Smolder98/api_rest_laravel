<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    use HasFactory;

      protected $fillable = [
             "user_id",
            "group_id",
            "status"
    ];

    // protected $hidden = [
    //     'created_at',
    //     'updated_at'
    //     ];

}
