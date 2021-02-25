@extends('admin.master')

@section('content')
<br>
	<div class="row">
		<div class="col-lg-12 margin-tb">
			<div class="pull-left">
				<h2> Laravel post list </h2>
			</div>

			<div class="pull-right">
				<a class="btn btn-success" href="create">Create new post</a>
			</div>
		</div>

		@if ($message = Session::get('success'))
			<div class="alert alert-succes">
				<p>{{ $message }}</p>
			</div>
		@endif

		<table class="table table-bordered">

			<tr>
				<th> Post title </th>
				<th> Post description </th>
				<th> Post logo </th>
				<th> Action </th>
			</tr>
			@foreach ($post as $pos)
			<tr>
				<td> {{ $pos->title }} </td>
				<td>
					{{ str_limit($pos->description, $limit = 70) }} 
				</td>
				<td> <img src="{{ URL::to($pos->logo) }}" height="70px" width="80px"> </td>
				<td> 
					<a class="btn btn-info" href="">Show</a>
					<a class="btn btn-primary" href="{{ URL::to('admin/edit/'.$pos->id) }}">Edit</a>
					<a class="btn btn-danger" href="{{ URL::to('admin/delete/'.$pos->id) }}"
						onclick="return confirm('are you sure ?')"
						>Delete</a>
				</td>	
			</tr>
			@endforeach
		</table>
		{!! $post->links() !!}
	</div>
@endsection