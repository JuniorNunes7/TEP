<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    public $table = "classes";

    protected $fillable = ['name'];
}