
@guest


@else
@extends('layouts.app')
@section('content')

<h1 class="card-title">Edit Post</h1><br>

{{-- Start using Laravel Collective --}}
<div class="container">
    {!! Form::open(['action' => ['PostsController@update',$post->id],'method'=>'POST']) !!}
    <div class="row">
        <div class="col">
            <div class="form-group">
                {{Form::label('title','Title')}}
                {{Form::text('title',$post->title,['class'=>'form-control',
                            'placeholder'=>'Title'])}}
            </div>
        </div>
    </div><br>

    <div class="row">
        <div class="col">
            <div class="form-group">
                {{Form::label('body','Body')}}
                {{Form::textarea('body',$post->body,['class'=>'ckeditor form-control','placeholder'=>'Body Text'])}}
            </div>

            <br>
        </div>

        <hr>
        {{ Form::hidden('_method', 'PUT') }}
        <div class="col">
            {!! Form::submit('Submit', ['class'=>'btn btn-primary align-right']) !!}
            <a href="{{ url()->previous() }}" class="btn btn-secondary align-right">Go Back</a>
        </div>


    </div>
    {!! Form::close() !!}
</div>

@endsection



@endguest
