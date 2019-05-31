<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ClassCreateRequest;
use App\Models\ClassModel;

class ClassController extends Controller
{

    public function create()
    {
        return view('class-create');
    }

    public function store(ClassCreateRequest $request)
    {
        return \DB::transaction(function() use ($request) {
            // $class = ClassModel::create($request->only('name', 'course'));

            // $class->schedules()->createMany($request->schedules);

            // return $class;
        });
    }
}
