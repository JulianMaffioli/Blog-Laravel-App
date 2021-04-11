

{{-- Checking the Errors Array --}}
@if(count($errors) > 0 )
@foreach($errors->all() as $error)
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error: </strong>{{$error}}
    <button type="button" class="btn-close align-right" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endforeach
@endif

{{-- Checking the Session errors --}}
@if (session('success'))
<script src="{{ asset('js/app.js') }}"></script>
<div class="alert alert-success alert-success fade show" role="alert">
    {{session('success')}}
    <button type="button" class="btn-close align-right" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if (session('warning'))
<script src="{{ asset('js/app.js') }}"></script>
<div class="alert alert-warning alert-warning fade show" role="alert">
    {{session('warning')}}
    <button type="button" class="btn-close align-right" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if (session('info'))
<script src="{{ asset('js/app.js') }}"></script>
<div class="alert alert-info alert-info fade show" role="alert">
    {{session('info')}}
    <button type="button" class="btn-close align-right" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if (session('error'))
<div class="alert alert-danger alert-danger fade show" role="alert">
    {{session('error')}}
    <button type="button" class="btn-close align-right" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
