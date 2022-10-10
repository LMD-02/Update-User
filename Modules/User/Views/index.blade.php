@extends('user::layout.master')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ mix('css/user.css', "vendor/asset") }}">
@stop
@section('content')
    <div id="app-main container-fluid">
        <div class="container">
            <div class="row no-gutter user-content">
                <div class="col-xl-3 component_nav-bar">
                    @include('user::components.nav-bar')
                </div>
                <div class="col-xl-9 col-12 component_content">
                    @include('user::components.content')
                </div>
            </div>
        </div>
    </div>
@stop

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="{{ mix('js/user.js', "vendor/asset") }}"></script>
@stop
