<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        DB::table("users")->insert([
            [
            "idFirebase"  => "dhjdhdwidhh3343",
            "name" =>"Abdiel",
            "lastname" =>"Licona",
            "numberAccount" =>"201910020280",
            "phone" =>"99693345",
            "status" =>"activo",
            "image" =>"image",
            "address" =>"direccion",
            "birthDate" =>"13/06/2000",
            "carrera" =>"Computacion",
            "email" =>"correo@correo.com",
            "password" =>"123"
            ],
             [
            "idFirebase"  => "dhjdhdwi454hh3343",
            "name" =>"Angel",
            "lastname" =>"Garcia",
            "numberAccount" =>"201910020250",
            "phone" =>"97893345",
            "status" =>"activo",
            "image" =>"image",
            "address" =>"direccion",
            "birthDate" =>"13/06/2000",
            "carrera" =>"Computacion",
            "email" =>"correo2@correo.com",
            "password" =>"123"
            ]
        ]);
    }
}
