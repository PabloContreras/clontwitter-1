@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ url('/tweet/create') }}" class="btn btn-primary pull-right">Add Tweet</a>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @foreach ($tweets as $tweet)
                @include('partials.tweet', ['tweet' => $tweet])
            @endforeach
        </div>
    </div>
</div>
@endsection
