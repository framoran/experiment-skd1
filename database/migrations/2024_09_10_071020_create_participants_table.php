<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipantsTable extends Migration
{
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->string('subject_nb');
            $table->string('subject_nb2');
            $table->integer('gender');
            $table->integer('gender2');
            $table->integer('age');
            $table->integer('age2');
            $table->integer('laterality');
            $table->integer('laterality2');
            $table->integer('condition');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('participants');
    }
}
