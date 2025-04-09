<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'start_date_time',
        'duration_hours',
        'duration_minutes',
        'type',
        'capacity',
        'location',
        'image_path',
        'description',
    ];
}
