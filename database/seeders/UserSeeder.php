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
            "idFirebase"  => "4645465645656",
            "name" =>"Abdiel",
            "lastname" =>"Licona",
            "numberAccount" =>"201910020280",
            "phone" =>"99693345",
            "status" =>"fdfdfdfd",
            "image" =>"fdfdfdf",
            "address" =>"dfdfdf",
            "birthDate" =>"dfdfdfdfdfdf",
            "carrera" =>"Computacion",
            "email" =>"correo@correo.com",
            "password" =>"123"
            ]

        ]);
    }
}
