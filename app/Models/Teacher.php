<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{

    protected $fillable = ['name', 'course_id'];

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}