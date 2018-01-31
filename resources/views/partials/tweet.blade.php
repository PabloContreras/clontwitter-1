<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
<div class="panel panel-default">
    <div class="panel-heading"><a href="{{ url('/profile/'.$tweet->user->nickname) }}">{{ $tweet->user->nickname }}</a></div>

    <div class="panel-body">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <p>{{ $tweet->body }}</p>
        <a href="{{ url('/tweet/'.$tweet->id.'/fav') }}" class="btn btn-info"><i class="fa fa-heart" aria-hidden="true"></i> {{ $tweet->favs->count() }}</a>
        <a href="{{ url('/tweet/'.$tweet->id.'/rt') }}" class="btn btn-info"><i class="fa fa-reply-all" aria-hidden="true"></i> {{ $tweet->retweets->count() }}</a>
    </div>
</div>