@extends('layouts.app')
@section('content')

<!-- main -->
<section class="breadcrumbs">
	<div class="container">
		<ol class="breadcrumb">
			<li><a href="{{url('/')}}">Home</a></li>
			<li><a href="{{url('/vidiog')}}">Videos</a></li>
			<li class="active">{{$vidio->judul}}</li>
		</ol>
	</div>
</section>

<section class="bg-image" style="background-image: url('{{asset('/img/youtube/'.$vidio->cover)}}');">
	<div class="overlay"></div>
	<div class="container">
		<div class="video-play" data-src="https://www.youtube.com/embed/zFUymXnQ5z8?rel=0&amp;amp;autoplay=1&amp;amp;showinfo=0">
			<div class="embed-responsive embed-responsive-16by9">
				<img class="embed-responsive-item" src="../../img.youtube.com/vi/BhTkoDVgF6s/maxresdefault.jpg">
				<div class="video-caption">
					{{-- <h5>For Honor: Walkthrough Gameplay Warlords</h5> --}}
					<span class="length">5:32</span>
				</div>
				<iframe width="420" height="315"
				src="https://www.youtube.com/embed/{{($vidio->link_id)}}">
			</iframe>
		</div>
	</div>
</div>
</section>
<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-9">
				
				<div class="post post-single">
					<div class="post-header">
						<div class="no-pad">
						</div>
						<div>
							<h2 class="post-title">{{($vidio->judul)}}</h2>
							<div class="post-meta">
								<span><i class="fa fa-clock-o"></i> {{ date('d F, Y', strtotime($vidio->created_at)) }} by <a href="profile.html">{{($vidio->berita->authors)}}</a></span>
								<span><a href="#comments"><i class="fa fa-eye"></i> {{($vidio->berita->views)}} Views</a></span>
							</div>
						</div>
					</div>
					<p>
						{!!$vidio->berita->deskripsi!!}
					</p>
				</div>

				<div class="post-actions">
					Tag : <br>
					<div class="post-tags">
						@foreach($vidio->berita->tags as $tag)
						<a href="{{route('showpertag', $tag->name)}}"><span id=""></span>#{{ $tag->name }}</a>
						@endforeach
					</div>
					<div class="social-share">
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
				</div>
				<div id="comments" class="comments anchor">
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
	s.src = 'https://laragame-remake.disqus.com/embed.js';
	s.setAttribute('data-timestamp', +new Date());
	(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
</div>
</div>
</section>
</div>
</div>

<div class="col-lg-3">
	<div class="sidebar">
		<!-- widget post  -->
		<div class="widget widget-videos">
			<h5 class="widget-title">Recommends</h5>
			<ul class="widget-list">
				@foreach($vidios as $data)
				<li>
					<div class="widget-img">
						<a href="{{route('vidios',$data->judul)}}"><img src="{{asset('/img/youtube/'.$data->cover)}}" alt=""></a>
						<span>2:13</span>
					</div>
					<h4><a href="{{route('vidios',$data->judul)}}">{{($data->judul)}}</a></h4>
					<span><i class="fa fa-clock-o"></i> {{ date('d F, Y', strtotime($data->created_at)) }}</span>
					<span><i class="fa fa-eye"></i> {{($vidio->berita->views)}}x</span>
				</li>
				@endforeach
			</ul>
		</div>
		<!-- /widget post -->
	</div>
</div>
</div>
</div>
</section>
@include('frontend.footer')

@endsection