@extends('layouts.app')
@section('title')Contact @endsection
@section('content')
    <h1>Contact</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('contact-form') }}" method="post" class="">
        @csrf
        <div class="mb-3">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="mb-3">
            <label for="subject">Subject</label>
            <input type="text" name="subject" id="subject" class="form-control">
        </div>
        <button class="btn btn-primary" type="submit">Submit</button>
    </form>
@endsection