@extends('layout.master')
@section('title', 'Task List')

@section('content')

    <nav class="mb-4">
        <a href="{{ route('tasks.create') }}" class="font-medium text-gray-700 underline decoration-pink-500">Add Task !</a>
    </nav>
  
    @forelse($tasks as $val)
    <p><a href="{{route('tasks.show', ['task' => $val->id])}}" @class(['font-bold','line-through' => $val->completed])>{{$val->title}}</a></p>

    @empty
    <div>There is No Task Yet</div>
    @endforelse
  
    @if($tasks->count())
        <nav class="mt-4">
        {{ $tasks->links() }}
        </nav>
    @endif
  
@endsection
