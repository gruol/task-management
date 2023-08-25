@extends('layouts')
@section('content')
@include('alerts')
<form action="{{route('tasks.update',$task->id)}}" method="Post">
	@csrf
  @method('put')
	<h3>Add Task</h3>
  <div class="form-group">
    <label for="email">Title:</label>
    <input type="text" class="form-control" required="" value="{{$task->title}}" id="title" name="title">
  </div>
  <div class="form-group">
    <label for="email">Status:</label>
    <select name="status" class="form-control" required="" >
      <option value=""> Select Status</option>
      <option value="pending" {{$task->status == "pending" ? "Selected" : ''}}> Pending</option>
      <option value="completed" {{$task->status == "completed" ? "Selected" : ''}}> Completed</option>
      
    </select>
  </div>
  <div class="form-group">
    <label for="pwd">Description:</label>
  	<textarea name="description" class="form-control" required="">  {{$task->description}}</textarea>	
  </div>
  
  <button type="submit" class="btn btn-default">Update</button>
</form>
@endsection