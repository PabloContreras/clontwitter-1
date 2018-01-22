@extends('tweet.create')

@section('editId',$tweet->id)
@section('editTweet',$tweet->body)

@section('editMethod')
	{{method_field('PUT')}}
@endsection