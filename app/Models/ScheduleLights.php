<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleLights extends Model
{
    use HasFactory;

    protected $fillable = [
        'pinID', 'setTo', 'schedule',
    ];
}
