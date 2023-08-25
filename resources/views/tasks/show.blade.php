@extends('layouts')
@section('content')
<table id="example" class="table table-striped table-bordered" style="width:100%">
	<thead>
		<tr>
			<th>#</th>
			<th>Title</th>
			<th>Description</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
		@if(!empty($task))
		<tr>
			<td>{{$task->id}}</td>
			<td>{{$task->title}}</td>
			<td>{{$task->description}}</td>
			<td>{{ucfirst($task->status) }}</td>


		</tr>
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