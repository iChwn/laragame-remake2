@extends('layouts.app')
@section('content')

<section class="p-t-30">
	<div class="container">
		<div class="toolbar-custom">
			<form method="post" class="float-left cold-12 col-sm-6 p-l-0 p-r-10">
				<div class="form-group input-icon-right">
					<i class="fa fa-search"></i>
					<form action="search_code" method="post" class="search-form">
						<button name="Submit" type="submit" title="Search" class="search-button" hidden="hidden"><i class="fa fa-search fa-lg"></i></button>
						<input name="search_code" type="text" placeholder="Search News..." class="form-control search-field">
						<input type="hidden" name="_token" value="{{{ csrf_token() }}}">
					</form>
				</div>
			</form>
			{{-- <div class="dropdown float-left">
				<button class="btn btn-default" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">All Platform <i class="fa fa-caret-down"></i></button>
				<div class="dropdown-menu">
					@foreach($categori as $data)       
					<a class="dropdown-item" href="{{route('showperkategori', $data->id)}}">{!! $data->categori !!}
					</a>
					@endforeach
				</div>
			</div> --}}

			<div class="btn-group float-right m-l-5 hidden-sm-down" role="group">
				<a class="btn btn-default btn-icon" href="#" role="button"><i class="fa fa-th-large"></i></a>
				<a class="btn btn-default btn-icon" href="#" role="button"><i class="fa fa-bars"></i></a>
			</div>

			{{-- <div class="dropdown float-right">
				<button class="btn btn-default" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Date Added <i class="fa fa-caret-down"></i></button>
				<div class="dropdown-menu dropdown-menu-right">
					<a class="dropdown-item active" href="#">Date Added</a>
					<a class="dropdown-item" href="#">Popular</a>
					<a class="dropdown-item" href="#">Newest</a>
					<a class="dropdown-item" href="#">Oldest</a>
				</div>
			</div> --}}
		</div>

		<div class="row">
			@foreach($berita as $data)
			<div class="col-12 col-sm-6 col-md-4">
				<div class="card card-lg">
					<div class="card-img">
						<a href="{{route('show.show',$data->judul_slug)}}">
							<img src="{{asset('/img/'.$data->cover)}}" style="width: 400px; height: 200px;" class="card-img-top" alt="Assassin's Creed Syndicate">
						</a>
						{{-- <div class="badge badge-pc">isi sama categorir</div> --}}
					</div>
					<div class="card-block">
						<h4 class="card-title">
							<a href="{{route('show.show',$data->judul_slug)}}">{{($data->judul)}}</a>
						</h4>
						<div class="card-meta">
							<span>{{ date('d F, Y', strtotime($data->created_at)) }}</span>
						</div>
						<p class="card-text">{!! substr($data->deskripsi,0,200)."..." !!}</p>
					</div>
				</div>
			</div>
			@endforeach
		</div>
		@if($berita->count()<=0)
		<section id="news" class="section-small">
			<div class="container">
				<h3 class="pull-left">ERR 404 Data Tidak Ada</h3>
			</div>
		</section>
		@endif

		<div class="pagination-results m-t-0">
			<span>Showing {{($berita->count())}} News of {{($berita->count())}} results</span>
			<nav aria-label="Page navigation">
				<ul class="pagination">
					<li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true"><i class="fa fa-angle-left"></i></span></a></li>
					{!! str_replace('/?', '?', $berita->render()); !!}
					<li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true"><i class="fa fa-angle-right"></i></span></a></li>
				</ul>
			</nav>
		</div>
	</div>
</section>
@include('frontend.footer')
@endsection