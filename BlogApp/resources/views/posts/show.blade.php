@extends('layouts.app')

@section('content')

<h1 class="card-title">{{$post->title}}</h1>
<div class="col">


    <small style="margin-top: 3rem;margin-bottom:1rem"> By {{$user->name}} on {{$post->created_at}}</small>
</div>
<hr>

<div class="card post-box mt-2 mb-2 shadow-sm bg-body rounded">
    <div class="card-body">
        {!!$post->body!!}
    </div>
</div>

<hr>
<div class="col">
    <a href="{{ url()->previous() }}" type="button" class="btn btn-secondary align-right">Go Back</a>

    @if (!Auth::guest())  {{-- Validation for guests --}}
    @if (Auth::user()->id == $post->user_id) {{-- Validation for other users --}}


        <a href="/posts/{{$post->id}}/edit" class="btn btn-primary align-right">Edit</a>
        <a data-bs-toggle="modal" data-bs-target='#confModal' class="btn btn-danger align-right">Delete</a>


        {{-- Confirmation Modal--}}
        <div id='confModal' class="modal" data-bs-backdrop="static">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Remove Post</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure that you want to delete this post?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                        {!! Form::open(['action'=>['PostsController@destroy',$post->id],
                        'method'=>'POST','type'=>'button']) !!}

                        {{ Form::hidden('_method','DELETE') }}
                        {{ Form::submit('Delete',['class'=>'btn btn-danger',]) }}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    @endif
    @endif

</div>


@endsection
