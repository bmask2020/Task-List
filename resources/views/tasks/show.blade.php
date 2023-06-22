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

       <div>
        <a href="{{ route('tasks.edit', ['task' => $tasks]) }}" class="btn btn-warning">Edit</a>
       </div>
        <br>

        <div>
            <form method="POST" action="{{ route('tasks.toggle.complete', ['task' => $tasks]) }}">
                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-success">
                    Mark as {{$tasks->completed ? 'not Completed' : 'Completed'}}
                </button>
            </form>
        </div>
        <br>

       <form action="{{ route('task.destroy', ['task' => $tasks]) }}" method="POST">
        @csrf 
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
       </form>
    </div>
    
@endsection
