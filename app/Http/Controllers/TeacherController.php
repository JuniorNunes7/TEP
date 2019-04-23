<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TeacherCreateRequest;
use App\Models\Teacher;

class TeacherController extends Controller
{

    public function create()
    {
        return view('teacher-create');
    }

    public function store(TeacherCreateRequest $request)
    {
        return \DB::transaction(function() use ($request) {
            $teacher = Teacher::create($request->only('name', 'course'));

            $teacher->schedules()->createMany($request->schedules);

            return $teacher;
        });
    }
}
