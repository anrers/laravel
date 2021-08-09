@extends('layouts.app')
@section('title'){{$data->subject}}@endsection
@section('content')
    <div class="alert alert-info">
        <h3>{{$data->subject}}</h3>
        <p><small>
                {{$data->name}}
            </small></p>
        <a href="{{ route('contact-one-update', $data->id) }}">
            <button class="btn btn-warning">Редактировать</button>
        </a>
        <a href="{{ route('contact-one-delete', $data->id) }}">
            <button class="btn btn-warning">Удалить</button>
        </a>
    </div>
@endsection