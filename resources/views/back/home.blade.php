@extends('app')

@section('app-header')
    @include('partials/_navigation', ['isBack' => 'true'])
@stop

@section('app-main')
    <div class="row">

        @include('partials._flash')

        <section class="col-md-9">
            <h2 class="page-title">My favs</h2>

            @if (count($favs) > 0)

                @foreach($favs as $fav)

                    @include('partials._fav_block')

                @endforeach

                @include('partials/_pagination')

            @else

                <div class="alert alert-danger" role="alert">
                    {!! message('user_has_no_favs') !!}
                </div>

            @endif
        </section>

        @include('partials/_sidebar')
    </div>
@stop