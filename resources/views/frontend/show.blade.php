@extends('layouts.app')
@section('content')
<!-- main -->
<section class="breadcrumbs">
	<div class="container">
		<ol class="breadcrumb">
			<li><a href="{{url('/')}}">Home</a></li>
			<li><a href="{{url('/blog')}}">Blog</a></li>
			<li class="active">{{$berita->judul}}</li>
		</ol>
	</div>
</section>

<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-1 hidden-md-down">
				<!-- widget share -->
				<div class="widget widget-share" data-fixed="widget">
					<!-- AddToAny BEGIN -->
					<div class="a2a_kit a2a_kit_size_32 a2a_default_style">
						<a class="a2a_dd" href="https://www.addtoany.com/share"></a>
						<a class="a2a_button_twitter"></a>
						<a class="a2a_button_google_gmail"></a>
						<a class="a2a_button_whatsapp"></a>
						<a class="a2a_button_facebook"></a>
					</div>
					<script async src="https://static.addtoany.com/menu/page.js"></script>
					<!-- AddToAny END -->
				</div>
			</div>
			<div class="col-lg-10">
				<!-- post -->
				<div class="post post-single">
					<h2 class="post-title">{{$berita->judul}}</h2>
					<div class="post-meta">
						<span><i class="fa fa-clock-o"></i> {{ date('d F, Y', strtotime($berita->created_at)) }} by <a href="profile.html">Constantine</a></span>
						<span><a href="#comments"><i class="fa fa-comment-o"></i> {{($berita->views)}} Views</a></span>
					</div>
					<div class="post-thumbnail">
						<img src="{{asset('/img/'.$berita->cover)}}" alt="Uncharted The Lost Legacy First Gameplay Details Revealed">
					</div>
					<p>{!!$berita->deskripsi!!}</p>
					<blockquote class="blockquote">
						<p>“{{$berita->spoiler}}”</p>
					</blockquote>
					@if($berita->count()>0)
					<p>{!!$berita->deskripsi2!!}</p>
					@endif
					@if($berita->count()<=0)
					tidakada
					@endif
				</div>
			</div>
			{{-- Realeted Post --}}
			<div class="post-related">
				<h6 class="subtitle">Related Posts</h6>
				<div class="row">
					@foreach($realeted as $data)
					<div class="col-12 col-sm-6 col-md-3">
						<div class="card card-widget">
							<div class="card-img">
								<a href="{{route('show.show',$data->judul_slug)}}"><img src="{{asset('/img/'.$data->cover)}}" alt="{{$data->spoiler}}" style="width: 400px; height: 150px;"></a>
							</div>
							<div class="card-block">
								<h4 class="card-title"><a href="{{route('show.show',$data->judul_slug)}}">{{$data->judul}}</a></h4>
								<div class="card-meta"><span><i class="fa fa-clock-o"></i> {{ date('d F, Y', strtotime($berita->created_at)) }}</span></div>
								<p>{!! substr($data->deskripsi,0,200)."..." !!}</p>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</section>
		<section class="breadcrumb">
			<div class="container">
				<div class="col-sm-12">
					<div id="disqus_thread"></div>
					<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
	var d = document, s = d.createElement('script');
	s.src = 'https://laragame-remake-1.disqus.com/embed.js';
	s.setAttribute('data-timestamp', +new Date());
	(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>


</div>
</div>
</section>
@include('frontend.footer')

@endsection
