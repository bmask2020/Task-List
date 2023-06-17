@extends('layout.master')

@section('title', 'Add Task')

@section('content')
<form action="{{route('tasks.store')}}" method="post">
@csrf
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Title</label>
    <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
   
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Description</label>
    <textarea name="description" class="form-control"></textarea>
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Long Description</label>
    <textarea name="long_description" class="form-control"></textarea>
  </div>
  
  <button type="submit" class="btn btn-primary">Add Task</button>

</form>

@endsection