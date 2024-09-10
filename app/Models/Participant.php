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
        'gender',
        'gender2',
        'age',
        'age2',
        'laterality',
        'laterality2',
        'condition',
    ];
}
