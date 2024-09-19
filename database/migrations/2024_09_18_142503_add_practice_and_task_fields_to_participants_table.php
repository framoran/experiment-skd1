<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPracticeAndTaskFieldsToParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('participants', function (Blueprint $table) {
            // Adding columns for practice phase
            $table->text('flower_practice')->nullable()->after('condition');
            $table->text('flower2_practice')->nullable()->after('flower_practice');
            $table->text('missedFlower_practice')->nullable()->after('flower2_practice');
            $table->text('missedFlower2_practice')->nullable()->after('missedFlower_practice');
            $table->integer('draw_practice')->nullable()->after('missedFlower2_practice');
            
            // Adding columns for task phase
            $table->text('flower_task')->nullable()->after('draw_practice');
            $table->text('flower2_task')->nullable()->after('flower_task');
            $table->text('missedFlower_task')->nullable()->after('flower2_task');
            $table->text('missedFlower2_task')->nullable()->after('missedFlower_task');
            $table->integer('draw_task')->nullable()->after('missedFlower2_task');
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
            // Dropping the columns if rolling back
            $table->dropColumn([
                'flower_practice',
                'flower2_practice',
                'missedFlower_practice',
                'missedFlower2_practice',
                'draw_practice',
                'flower_task',
                'flower2_task',
                'missedFlower_task',
                'missedFlower2_task',
                'draw_task'
            ]);
        });
    }
}