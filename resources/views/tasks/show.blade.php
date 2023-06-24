@extends('layout.master')

@section('title', 'Task Details')

@section('content')

    <div class="mb-4">
    <a href="{{ route('tasks.index') }}" class="font-medium text-gray-700">🔙 Go Back To Tasks List</a>
    </div>

    <div>
       <h1 class="mb-2 text-slate-700">{{$tasks->title}}</h1>
       <p class="mb-2 text-slate-700">{{$tasks->description}}</p>
       <p class="mb-2 text-slate-700">{{$tasks->long_description}}</p>
       @if($tasks->completed == 0)
       <p class="mb-2 font-medium text-red-500">Status : Not Completed</p>
       @else 
       <p class="mb-2 font-medium text-green-500">Status : Completed</p>
       @endif

       <p class="mb-2 text-sm text-slate-500">Created at: {{$tasks->created_at->diffForHumans()}}</p>

        <div class="flex gap-2">
        <a class="btn" href="{{ route('tasks.edit', ['task' => $tasks]) }}">Edit</a>
      
            <form method="POST" action="{{ route('tasks.toggle.complete', ['task' => $tasks]) }}">
                @csrf
                @method('PUT')
                <button type="submit" class="btn mb-2 mt-2">
                    Mark as {{$tasks->completed ? 'not Completed' : 'Completed'}}
                </button>
            </form>
      

       <form action="{{ route('task.destroy', ['task' => $tasks]) }}" method="POST">
        @csrf 
        @method('DELETE')
        <button type="submit" class="btn mb-2">Delete</button>
       </form>
       </div>
    </div>
    
@endsection
