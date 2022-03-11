<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string("idFirebase")->unique();
            $table->string("name");
            $table->string("lastname");
            $table->string("numberAccount");
            $table->string("phone");
            $table->string("status");
            $table->binary("image");
            $table->string("address");
            $table->string("birthDate");
            $table->string("carrera");
            $table->string("email")->unique();
            $table->string("password");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
