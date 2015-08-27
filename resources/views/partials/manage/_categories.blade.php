<div class="table-responsive">
	@if (count($categories) > 0)

		<table class="table table-bordered">
		
			<thead>
				
				<th>Title</th>
				<th>Description</th>
				<th># of favs</th>
				<th>Options</th>
				
			</thead>
			
			@foreach ($categories as $category)
			
				<tr> 
					
					<td>{{ $category->title }}</td>
					<td>{{ $category->description }}</td>
					<td>{{ count($category->favs()->where('status', '=', 1)->get()) }}</td>
					
					<td>
						<a href="{{ url('categories/' . $category->id . '/edit') }}"><button class="btn btn-warning btn-sm">Edit</button></a>
						{!! Form::open(['url' => 'categories/' . $category->id, 'method' => 'delete', 'style' => 'display:inline;', 'class' => 'form-delete']) !!}
							<a href="{{ action('CategoriesController@destroy', ['id' => $category->id]) }}"><button class="btn btn-danger btn-sm btn-delete">Delete</button></a>
						{!! Form::close() !!}
					</td>  
					
				</tr>
			
			@endforeach
		
		</table>
		
		{!! $categories->render() !!}

		@else

		<div class="alert alert-danger">
			{!! message('user_has_no_categories') !!}
		</div>
		
	@endif
</div>