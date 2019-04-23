<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{

    protected $fillable = ['name', 'course'];

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}