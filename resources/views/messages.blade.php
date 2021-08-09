@extends('layouts.app')
@section('title')Все сообщения@endsection
@section('content')
    <h1>Все сообщения</h1>
    @foreach($data as $mess)
        <div class="alert alert-info">
            <h3>{{$mess->subject}}</h3>
            <p><small>
                    {{$mess->name}}
                </small></p>
            <a href="#">
                <button class="btn btn-warning">Редактировать</button>
            </a>
        </div>
    @endforeach
@endsection