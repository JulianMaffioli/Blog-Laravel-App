@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{$title}}</h1>

    {{-- If exists more than one service, then --}}
    @if(count($services) > 0)

    {{-- List every services --}}
    <ul class="list-group">
        @foreach($services as $service)
        <li class="list-group-item">{{$service}}</li>
        @endforeach
    </ul>

</div>
@endif


@endsection
