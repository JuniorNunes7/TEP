<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TeacherCreateRequest;
use App\Models\{Teacher, Time, Course};

class TeacherController extends Controller
{

    public function create()
    {
        $courses = Course::all();
        $times = Time::all();

        return view('teacher-create', compact('times', 'courses'));
    }

    public function store(TeacherCreateRequest $request)
    {
        return \DB::transaction(function() use ($request) {
            $teacher = Teacher::create($request->only('name', 'course_id'));

            foreach($request->schedules as $scheduleData) {
                $schedule = $teacher->schedules()->create(['weekday' => $scheduleData['weekday']]);

                $times = Time::where('id', '>=', $scheduleData['start_id'])
                    ->where('id', '<=', $scheduleData['end_id'])
                    ->where('interval', 0)
                    ->get()->pluck('id');

                $schedule->times()->sync($times);
            }


            return $teacher;
        });
    }
}
