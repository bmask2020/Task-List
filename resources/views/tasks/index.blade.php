@extends('layout.master')

@section('title', 'Task List')

@section('content')

    @foreach($tasks as $val)
    <p><a href="{{route('tasks.show', ['id' => $val->id])}}">{{$val->title}}</a></p>

    @endforeach
    <br><br>
@endsection
