@extends('layouts.app')

@section('content')
    <div class="content" style="margin-top: 25% !important;">
        <div class="col-12 row">
            <div class="col-4">
                <a href="/teacher/create" class="btn btn-secondary btn-xg">Cadastrar Professor</a>
            </div>
            <div class="col-4">
                <a href="/class/create" class="btn btn-secondary btn-xg">Cadastrar Turma</a>
            </div>
            <div class="col-4">
                <a href="/grid/create" class="btn btn-secondary btn-xg">Montar Grade</a>
            </div>
        </div>
    </div>
@endsection