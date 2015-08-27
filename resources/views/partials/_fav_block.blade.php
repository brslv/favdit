<article class="fav-block">
    <h3>
        <a href="{{ url($fav->link) }}" class="fav-link" target="_blank">
            {{ $fav->title }} <span class="glyphicon glyphicon-new-window small-gliph"></span>
        </a>
    </h3>

    @if (count($fav->category) > 0)
    	<small class="fav-meta"><span class="glyphicon glyphicon-inbox"></span> in <a href="/favs/category/{{ $fav->category->slug }}">{{ $fav->category->title }}</a></small>
    @else
		<small class="fav-meta"><span class="glyphicon glyphicon-inbox"></span> in <a href="/favs/without-category">Without category</a></small>
	@endif    

    @if ($fav->description)
        <p><span class="glyphicon glyphicon-comment"></span> {{ $fav->description }}</p>
    @endif
</article>