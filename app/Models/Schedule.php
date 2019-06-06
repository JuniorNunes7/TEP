<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = ['teacher_id', 'weekday'];

    public function times()
    {
        return $this->belongsToMany(Time::class, 'schedule_times');
    }
}