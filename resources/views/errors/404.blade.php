@extends('layouts.app')
@section('content')

<section class="bg-image bg-image-sm error-404" style="background-image: url({{asset('/template/img.youtube.com/vi/y3Cpetu4ke4/maxresdefault.jpg')}});">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 mx-auto">
				<div class="heading">
					<h2>404</h2>
				</div>
				<p>Halaman yang anda cari tidak ada.</p>
				
				<div class="m-t-50">
					<a href="{{url('/')}}" class="btn btn-primary btn-effect btn-shadow btn-rounded btn-lg">Back to home</a>
					<a href="{{url('/contact')}}" class="btn btn-outline-default btn-rounded btn-lg m-l-10">Contact Us</a>
				</div>
			</div>
		</div>
	</div>
</section>

@include('frontend.footer')
@endsection