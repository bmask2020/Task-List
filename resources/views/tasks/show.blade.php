@extends('layout.master')

@section('title', 'Task Details')

@section('content')

    <div>
       <h1>{{$tasks->title}}</h1>
       <p>{{$tasks->description}}</p>
       <p>{{$tasks->long_description}}</p>
       @if($tasks->completed == 0)
       <p>Status : Not Completed</p>
       @else 
       <p>Status : Completed</p>
       @endif

       <p>Created at: {{$tasks->created_at}}</p>
    </div>
    
@endsection
