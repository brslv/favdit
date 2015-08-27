@extends('app')

@section('app-header')
    @include('partials._navigation', ['isBack' => 'true'])

@stop

@section('app-main')
    <div class="row">
        <section class="col-md-9">
            <h2 class="page-title">
                @if ( ! count($fails) > 0)
                    Favs in {{ $favs[0]->category->title }}
                @else
                    Ooops.
                @endif
            </h2>

            @if (count($fails) > 0)
                @foreach($fails as $fail)
                    <div class="alert alert-danger">
                        {{ $fail }}
                    </div>
                @endforeach
            @endif

            @if (empty($fails))

                @foreach($favs as $fav)

                    @include('partials._fav_block')

                @endforeach

                @include('partials/_pagination')

            @endif

        </section>

        @include('partials._sidebar')
    </div>
@stop