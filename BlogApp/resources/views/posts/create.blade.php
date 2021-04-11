@extends('layouts.app')

@section('content')

<h1 class="card-title">Create Post</h1><br>

{{-- Start using Laravel Collective --}}
<div class="container">
    {!! Form::open(['action' => 'PostsController@store','method'=>'POST', 'enctype'=>'multipart/data']) !!}
    <div class="row">
        <div class="col-8 ">
            <div class="form-group">
                    {{Form::label('title','Title')}}
                    {{Form::text('title','',['class'=>'form-control','placeholder'=>'Title'])}}
            </div>
        </div><br>

        <div class="col-4" >
            <div class="form-group"  style="margin-top:8%;">
                {{Form::file('cover_image')}}
            </div>
        </div>

    </div><br>

    <div class="row">
        <div class="col">
            <div class="form-group">
                {{Form::label('body','Body')}}
                {{Form::textarea('body','',['class'=>'ckeditor form-control','placeholder'=>'Body Text'])}}
            </div>

            <br>
        </div>

        <hr>
        <div class="col">
            {!! Form::submit('Submit', ['class'=>'btn btn-primary align-right']) !!}
            <a class="btn btn-secondary align-right" href="{{ url()->previous() }}">Back</a>
        </div>


    </div>
    {!! Form::close() !!}
</div>









@endsection
