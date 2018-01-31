@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
			    <div class="panel-heading">
			    <div class="row">
			    	<div class="col-md-4">
			    		<h1>{{ '@'.$user->nickname }} </h1>
			    	</div>
			    	<div class="col-md-8">
			    	<br>
					
						@if (Auth::user()->follows($user->id))
							<a href="{{ url('/profile/'.$user->id.'/follow') }}" class="btn btn-danger">
							<i class="fa fa-times-circle-o" aria-hidden="true"></i>
							Unfollow
						@else
							<a href="{{ url('/profile/'.$user->id.'/follow') }}" class="btn btn-info">
							<i class="fa fa-plus-square-o" aria-hidden="true"></i>
							Follow
						@endif
					</a>
					</div>
					</div>
			    </div>

			    <div class="panel-body">
			        <p>{{$user->name}}</p>
			        <p>{{$user->email}}</p>
			        <div class="row">
			        	<div class="col-md-4">
			        		<p class="text-center">
			        			Tweets: {{ $user->tweets->count() }}
			        		</p>
			        	</div>
			        	<div class="col-md-4">
			        		<p class="text-center">
			        			Followers: n
			        		</p>
			        	</div>
			        	<div class="col-md-4">
			        		<p class="text-center">
			        			Following: n
			        		</p>
			        	</div>
			        </div>
			    </div>
			</div>
		</div>
	</div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @foreach ($user->tweets as $tweet)
                @include('partials.tweet', ['tweet' => $tweet])
            @endforeach
        </div>
    </div>
</div>
@endsection
