@extends('layouts.app')

@section('content')

<h1 class="card-title">All Posts</h1><br>

@if (count($posts)>0)
@foreach ($posts as $post )
<div class="list-group" style="overflow: auto;">
    <div class="list-group-item shadow-sm p-3 mb-4 bg-body rounded">
        <h4> <a href="/posts/{{$post->id}}">{{$post->title}}</a></h4>
        <small>Written by {{$post->user->name}} on {{$post->created_at}}</small>
    </div>
</div>
@endforeach

<div class="align-center">
    {{ $posts->links() }}
</div>
@else
<p>No Posts Found</p>
@endif


@endsection
