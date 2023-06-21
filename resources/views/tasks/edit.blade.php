@extends('layout.master')

@section('content')
  @include('tasks.form', ['tasks' => $tasks])
@endsection