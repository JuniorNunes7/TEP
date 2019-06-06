@extends('layouts.app')

@section('content')
    <div class="content mt-5">
        <teacher-create 
            :courses="{{ $courses }}"
            :times="{{ $times }}"
        ></teacher-create>
    </div>
@endsection