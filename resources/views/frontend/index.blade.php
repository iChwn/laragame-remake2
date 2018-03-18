@extends('layouts.app')
@section('content')
{{-- Carousel --}}
@include('frontend.carousel')

{{-- News --}}
@include('frontend.news')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"></div>
                <div class="panel-body">

                </div>
            </div>
        </div>
    </div>
</div>
@include('frontend.footer')
@endsection