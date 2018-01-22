
<div class="panel panel-default">
    <div class="panel-heading"><a href="{{ url('/profile/'.$tweet->user->nickname) }}">{{ $tweet->user->nickname }}</a></div>

    <div class="panel-body">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        {{ $tweet->body }}
    </div>
</div>