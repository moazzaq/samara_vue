@extends('welcome')
@section('content')

    <all-posts :posts="{{ $posts }}"></all-posts>
@stop
