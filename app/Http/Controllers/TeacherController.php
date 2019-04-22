<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TeacherCreateRequest;

class TeacherController extends Controller
{

    public function create()
    {
        return view('teacher-create');
    }

    public function store(TeacherCreateRequest $request)
    {
        echo "<pre>"; print_r($request->all()); exit;
    }
}
