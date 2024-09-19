<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('participants', function (Blueprint $table) {
            // Remove columns
            $table->dropColumn(['gender', 'gender2', 'age', 'age2', 'laterality', 'laterality2']);
            
            // Add new columns
            $table->text('subject_code1')->after('subject_nb2');
            $table->text('subject_code2')->after('subject_code1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('participants', function (Blueprint $table) {
            // Add back the dropped columns (in case of rollback)
            $table->integer('gender')->nullable();
            $table->integer('gender2')->nullable();
            $table->integer('age')->nullable();
            $table->integer('age2')->nullable();
            $table->integer('laterality')->nullable();
            $table->integer('laterality2')->nullable();

            // Drop the new columns
            $table->dropColumn(['subject_code1', 'subject_code2']);
        });
    }
}
