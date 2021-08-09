@extends('layouts.app')
@section('title'){{$data->subject}}@endsection
@section('content')
<form action="{{ route('contact-one-submit', $data->id) }}" method="post" class="">
    @csrf
    <div class="mb-3">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{$data->name}}" class="form-control">
    </div>
    <div class="mb-3">
        <label for="subject">Subject</label>
        <input type="text" name="subject" value="{{$data->subject}}" id="subject" class="form-control">
    </div>
    <button class="btn btn-primary" type="submit">Submit</button>
</form>
@endsection