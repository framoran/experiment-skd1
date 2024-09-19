<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject_nb',
        'subject_nb2',
        'subject_code1',
        'subject_code2',
        'flower_practice',
        'flower2_practice',
        'missedFlower_practice',
        'missedFlower2_practice',
        'draw_practice',
        'flower_task',
        'flower2_task',
        'missedFlower_task',
        'missedFlower2_task',
        'draw_task',
        'condition',
    ];
}
