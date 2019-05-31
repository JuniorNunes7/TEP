<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\GridCreateRequest;
use App\Models\Grid;

class GridController extends Controller
{

    public function create()
    {
        return view('grid-create');
    }

    public function store(GridCreateRequest $request)
    {
        return \DB::transaction(function() use ($request) {
            // $grid = Grid::create($request->only('name', 'course'));

            // $grid->schedules()->createMany($request->schedules);

            // return $grid;
        });
    }
}
