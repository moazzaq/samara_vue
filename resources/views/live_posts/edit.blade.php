@extends('welcome')
@section('content')

    <livewire:post-edit :postId="$post->id" />
@stop
