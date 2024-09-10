<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperimentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiments', function (Blueprint $table) {
            $table->id(); // Equivalent to `bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT`
            $table->string('user_id');
            $table->integer('experimentGroup');
            $table->string('link');
            $table->string('experiment');
            $table->string('first_link')->nullable();
            $table->string('second_link')->nullable();
            $table->string('lang');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('vitesse')->default(2);
            $table->integer('stars_points')->default(30);
            $table->integer('collision_rocks_points')->default(100);
            $table->integer('fired_rocks_points')->default(30);
            $table->integer('refuel_points')->default(300);
            $table->integer('event_time')->default(60000);
            $table->integer('prediction')->default(0);
            $table->integer('postdiction')->default(0);
            $table->integer('event')->default(1);

                  });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('experiments');
    }
}
