<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("studentroom_id")->unsigned();
            $table->string("firstname", 100);
            $table->string("lastname", 100);
            $table->string("nickname", 100)->nullable();
            $table->char("status", 3);
            $table->timestamps();
            
        });
        Schema::table('students', function (Blueprint $table) {
            $table->foreign('studentroom_id')->references('id')->on("studentrooms");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
