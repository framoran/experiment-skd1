<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExperimentSettingsToExperimentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('experiments', function (Blueprint $table) {
            $table->integer('vitesse')->default(1);
            $table->integer('stars_points')->default(30);
            $table->integer('collision_rocks_points')->default(100);
            $table->integer('fired_rocks_points')->default(30);
            $table->integer('refuel_points')->default(300);
            $table->integer('event_time')->default(60000);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('experiments', function (Blueprint $table) {
            $table->dropColumn('vitesse');
            $table->dropColumn('stars_points');
            $table->dropColumn('collision_rocks_points');
            $table->dropColumn('fired_rocks_points');
            $table->dropColumn('refuel_points');
            $table->dropColumn('event_time');
        });
    }
}
