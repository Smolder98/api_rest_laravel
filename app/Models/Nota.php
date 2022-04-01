<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;



    protected $fillable = [
             "id",
             "title",
            "content",
            "user_id",
            "status"
    ];


    protected $hidden = [
        'created_at',
        // 'updated_at'
    ];




     public function userCreated(){
        return $this->belongsTo(Users::class, 'user_id');
    }





}
