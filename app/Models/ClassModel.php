<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    protected $table = "classes";

    protected $fillable = ['name'];

    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'class_id');
    }
}