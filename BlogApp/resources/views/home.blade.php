@extends('layouts.index_app')

@section('content')

<div class="index-img-bg ">

    <div class="img-mask d-flex justify-content-center" >

        <div style="margin-top: 55px">

            <h4 class="font-color ">Hi {{ Auth::user()->name }}</h4>

            <div class=' border mt-99' >
                @include('includes.messages')


                <div class="row">
                    <div class="col-7">
                        <h2>Your Blog Posts</h2>
                    </div>
                    <div class="col-5">
                        <a href="/posts/create" class="btn btn-info align-right">Create Post</a>
                    </div>

                    @if ( count($posts) > 0)


                    <table class='table table-striped'>
                        <tr>
                            <th class='font-color'>
                                <h3>Title</h3>
                            </th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach (($posts)->reverse() as $post)
                        <tr>

                            <div class="row">

                                <div class="col">
                                    <th ><a class="font-color"  href="/posts/{{$post->id}}">{{$post->title}}</a></th>
                                </div>

                                <th>
                                    <div class="col align-right">

                                        <a href="/posts/{{$post->id}}/edit"
                                            class='btn btn-info '>Edit</a>

                                        <a data-bs-toggle="modal" data-bs-target='#confModal'
                                            class="btn btn-danger ">Delete</a>
                                    </div>
                                </th>




                        </tr>

                        {{-- Confirmation Modal --}}
                        <div id='confModal' class="modal" data-bs-backdrop="static">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h5 class="modal-title font-color-b">Remove Post</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body font-color-b">
                                        <p>Are you sure that you want to delete this post?</p>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancel</button>

                                        {!! Form::open(['action'=>['PostsController@destroy',$post->id],
                                        'method'=>'POST','type'=>'button']) !!}

                                        {{ Form::hidden('_method','DELETE') }}
                                        {{ Form::submit('Delete',['class'=>'btn btn-danger',]) }}

                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach




                    </table>
                    @else

                    <h4 class="align-center">Nothing Posted Yet...</h4><br><br>
                    @endif


                </div>
            </div>
        </div>
    </div>


    <div class="container text-center content-bg">

    </div>





</div>

@endsection
