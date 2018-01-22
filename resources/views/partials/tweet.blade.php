
<div class="panel panel-default">
    <div class="panel-heading"><a href="{{ url('/profile/'.$tweet->user->nickname) }}">{{ $tweet->user->nickname }}</a></div>

    <div class="panel-body">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <p>{{ $tweet->body }}</p>
        <a href="{{ url('/tweet/'.$tweet->id.'/fav') }}" class="btn btn-info">Favorite</a>
        <a href="{{ url('/tweet/'.$tweet->id.'/rt') }}" class="btn btn-info">Retweet</a>
    </div>
</div>