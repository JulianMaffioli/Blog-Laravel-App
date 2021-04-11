@extends('layouts.index_app')

@section('content')

<div class="index-img-bg ">

    <div class="img-mask d-flex justify-content-center align-items-center">

        <div class="text-white text-center">
            <h1 class="mb-3">Welcome to Laravel!</h1>
            <h4 class="mb-3">This is just a Test</h4>

            <a class="btn btn-outline-light btn-lg btn-info" href="/login" role="button">Login</a>
            <a class="btn btn-outline-light btn-lg btn-success" href="/register" role="button">Register</a>
        </div>
    </div>


    <div class="container text-center content-bg">

    </div>

</div>

@endsection
