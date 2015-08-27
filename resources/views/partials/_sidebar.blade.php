<aside class="sidebar col-md-3">
    <h2 class="page-title">Filter favs</h2>

    <div class="list-group">
        @if (isset($selectedCategory) && $selectedCategory == 'All')
            <a href="{{ url('favs') }}" class="list-group-item active">All favs</a>
        @else
            <a href="{{ url('favs') }}" class="list-group-item">All favs</a>
        @endif

        @if (isset($selectedCategory) && $selectedCategory == 'Without-category')
            <a href="{{ url('favs/without-category') }}" class="list-group-item active">Without favs</a>
        @else
            <a href="{{ url('favs/without-category') }}" class="list-group-item">Without favs</a>
        @endif

        @if (isset($categories) && count($categories) > 0)

            <hr />

            @foreach ($categories as $category)
                @if (isset($selectedCategory) && $selectedCategory == $category->title)
                    <a href="{{ url('favs/category/' . $category->slug) }}" class="list-group-item active">{{ $category->title }}</a>
                @else
                    <a href="{{ url('favs/category/' . $category->slug) }}" class="list-group-item">{{ $category->title }}</a>    
                @endif
            @endforeach

        @endif
    </div>

    {{-- <ul class="nav nav-pills nav-stacked">
        <li><a href="{{ url('/favs') }}">All favs</a></li>
        <li><a href="{{ url('/favs/without-category') }}">Without category</a></li>

        @if (isset($categories) && count($categories) > 0)
        
        	<hr />

            @foreach ($categories as $category)

                <li><a href="{{ url('favs/category/' . $category->slug) }}">{{ $category->title }}</a></li>

            @endforeach

        @endif
    </ul> --}}
</aside>