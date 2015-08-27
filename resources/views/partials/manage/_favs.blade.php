<div class="table-responsive">
	@if (count($favs) > 0)

		<table class="table table-bordered">
		
			<thead>
				
				<th>Fav</th>
				<th>Description</th>
				<th>Category</th>
				<th>Options</th>
				
			</thead>
			
			@foreach ($favs as $fav)
			
				<tr> 
					
					<td><a href="{{ url($fav->link) }}">{{ $fav->title }}</a></td>

					<td>{{ $fav->description }}</td>
					
					@if (isset($fav->category->title))

						<td>{{ $fav->category->title }}</td> 
					
					@else
						
						<td>Without category</td> 					
					
					@endif
					<td>
						<a href="{{ url('favs/' . $fav->id . '/edit') }}"><button class="btn btn-warning btn-sm">Edit</button></a>
						{!! Form::open(['url' => 'favs/' . $fav->id, 'method' => 'delete', 'style' => 'display:inline;', 'class' => 'form-delete']) !!}
							<a href="{{ action('FavsController@destroy', ['id' => $fav->id]) }}"><button class="btn btn-danger btn-sm btn-delete">Delete</button></a>
						{!! Form::close() !!}
					</td>  
					
				</tr>
			
			@endforeach
		
		</table>
		
		{!! $favs->render() !!}

		@else

			<div class="alert alert-danger">
				{!! message('user_has_no_favs') !!}
			</div>
		
	@endif
</div>