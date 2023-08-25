@extends('layouts')
@section('content')
@include('alerts')
<form action="{{route('tasks.store')}}" method="Post">
	@csrf
	<h3>Add Task</h3>
  <div class="form-group">
    <label for="email">Title:</label>
    <input type="text" class="form-control" required="" value="{{old('title')}}" id="title" name="title">
  </div>
  <div class="form-group">
    <label for="pwd">Description:</label>
  	<textarea name="description" class="form-control" required="">  {{old('description')}}</textarea>	
  </div>
  
  <button type="submit" class="btn btn-default">Submit</button>
</form>
@endsection