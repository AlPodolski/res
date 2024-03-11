@extends('layouts.admin')

@section('title', 'Анкеты')

@section('content')

    @include('admin.include.nav')

    <div class="control-panel">
        <div class="control-panel-item btn btn-success" onclick="check_all()">
            Одобрить все
        </div>
    </div>

    @gridView($gridData)

    <div class="control-panel">
        <div class="control-panel-item btn btn-success" onclick="check_all()">
            Одобрить все
        </div>
    </div>

@endsection
