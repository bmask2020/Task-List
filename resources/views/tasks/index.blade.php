@extends('layout.master')

@section('styles')

    <style>
        nav svg , .shadow-sm {

            display:none
        }
    </style>

@endsection

@section('title', 'Task List')

@section('content')

    @forelse($tasks as $val)
    <p><a href="{{route('tasks.show', ['task' => $val->id])}}">{{$val->title}}</a></p>

    @empty
    <div>There is No Task Yet</div>
    @endforelse
    <br>
    @if($tasks->count())
        <nav>
        {{ $tasks->links() }}
        </nav>
    @endif
    <br><br>
@endsection
