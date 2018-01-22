@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">New Tweet</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('addTweet') }}/@yield('editId')">
                        {{ csrf_field() }}
                        @section('editMethod')
                            @show
                        <div class="form-group{{ $errors->has('tweet') ? ' has-error' : '' }}">
                            <label for="tweet" class="col-md-4 control-label">Tweet</label>

                            <div class="col-md-6">
                                <input id="tweet" type="text" class="form-control" name="tweet" value="@yield('editTweet')" required>

                                @if ($errors->has('tweet'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tweet') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Add Tweet
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection