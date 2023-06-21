@extends('layout.master')

@section('title', isset($tasks) ? 'Edit Task' : 'Add Task')

@section('styles')

<style>

  .error-message {

    color:red;
    font-size:0.8rem

  }

</style>

@endsection

@section('content')
<form action="{{isset($task) ? route('tasks.update', ['task' => $tasks->id]) : route('tasks.store')}}" method="post">
@csrf

@isset($task)
@method('PUT')
@endisset
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Title</label>
    <input type="text" name="title" class="form-control" value="{{$tasks->title ?? old('title')}}" id="exampleInputEmail1" aria-describedby="emailHelp">
   @error('title')
    <p class="error-message">{{ $message }}</p>
   @enderror
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Description</label>
    <textarea name="description" class="form-control">{{$tasks->description ?? old('description')}}</textarea>
    @error('description')
    <p class="error-message">{{ $message }}</p>
    @enderror
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Long Description</label>
    <textarea name="long_description" class="form-control">{{$tasks->long_description ?? old('long_description')}}</textarea>
    @error('long_description')
    <p class="error-message">{{ $message }}</p>
    @enderror
  </div>
  
  <button type="submit" class="btn btn-primary">
    @isset($tasks)
    Update Task 
    @else 
    Add Task
    @endisset
  </button>

</form>

@endsection