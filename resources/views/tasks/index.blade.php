@extends('layouts')
@section('content')
@include('alerts')
<table id="example" class="table table-striped table-bordered" style="width:100%">
	<thead>
		<tr>
			<th>#</th>
			<th>Title</th>
			<th>Description</th>
			<th>Status</th>
			<th>Edit / View  </th>
			<th>Delete</th>

		</tr>
	</thead>
	<tbody>
		@if(!empty($tasks))
		@foreach($tasks as $task)
		<tr>
			<td>{{$task->id}}</td>
			<td>{{$task->title}}</td>
			<td>{{$task->description}}</td>
			<td>{{ucfirst($task->status) }}</td>
			<td>
				<a class="btn btn-primary" href="{{route('tasks.edit',$task->id)}}" >Edit</a>
				<a class="btn btn-success" href="{{route('tasks.show', $task->id)}}" >View</a>
	
			</td> 
			<td>

				<form action="{{route('tasks.destroy',$task->id)}}"  accept-charset="utf-8" method="Post"
					onsubmit="return confirn('{{trans('Are You Sure ?')}}')" 
					>
					@csrf
					<input type="hidden" name="_method" value="DELETE">
					<input type="submit"  value="Delete" class="btn btn-danger">
				</form>	
			</td>              

		</tr>
		@endforeach
		@endif
	</tbody>
</table>
@endsection
@section('js')
<script>
	$(document).ready(function() {
		$('#example').DataTable( {

		} );
	} );
</script>
@endsection