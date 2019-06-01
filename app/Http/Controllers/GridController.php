<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\GridCreateRequest;
use App\Models\{Teacher, ClassModel, Schedule};

class GridController extends Controller
{

    public function create()
    {
        $teachers = Teacher::with('schedules')->get();
        $classes = ClassModel::with('schedules')->get();

        return view('grid-create', compact('teachers', 'classes'));
    }

    public function update(GridCreateRequest $request)
    {
        return \DB::transaction(function() use ($request) {
            $class = ClassModel::findOrFail($request->class_id);
            Schedule::where('class_id', $class->id)->update(['class_id' => null]);
            Schedule::whereIn('id', $request->schedules)->update(['class_id' => $class->id]);

            return $class;
        });
    }
}
