<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->string("idFirebase")->unique();
            $table->string("title");
            $table->text("description");
            $table->binary("image")->nullable();
            $table->string("status");
            $table->unsignedBigInteger("user_id_created");
            $table->timestamps();

            $table->foreign("user_id_created")->references('id')->on('users')->onDelete("cascade");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groups');
    }
}
