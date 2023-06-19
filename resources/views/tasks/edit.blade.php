@extends('layout.master')

@section('title', 'Edit Task')

@section('styles')

<style>

  .error-message {

    color:red;
    font-size:0.8rem

  }

</style>

@endsection

@section('content')
<form action="{{route('tasks.update', ['id' => $tasks->id])}}" method="post">
@csrf
@method('PUT')
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Title</label>
    <input type="text" name="title" class="form-control" id="exampleInputEmail1" value="{{ $tasks->title }}" aria-describedby="emailHelp">
   @error('title')
    <p class="error-message">{{ $message }}</p>
   @enderror
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Description</label>
    <textarea name="description" class="form-control"> {{ $tasks->description }} </textarea>
    @error('description')
    <p class="error-message">{{ $message }}</p>
    @enderror
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Long Description</label>
    <textarea name="long_description" class="form-control"> {{ $tasks->long_description }} </textarea>
    @error('long_description')
    <p class="error-message">{{ $message }}</p>
    @enderror
  </div>
  
  <button type="submit" class="btn btn-primary">Edit Task</button>

</form>

@endsection