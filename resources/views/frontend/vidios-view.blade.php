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
	<div class="overlay-light"></div>
	<div class="container">
		<div class="embed-responsive embed-responsive-16by9">
			<iframe class="embed-responsive-item" src="{{$vidio->link}}" allowfullscreen></iframe>
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
								<span><i class="fa fa-clock-o"></i> {{ date('d F, Y', strtotime($vidio->created_at)) }} by <a href="profile.html">Clark</a></span>
								<span><a href="#comments"><i class="fa fa-comment-o"></i> 33 comments</a></span>
							</div>
						</div>
					</div>
					<p>
						{!!$vidio->berita->deskripsi!!}
					</p>
				</div>

				<div class="post-actions">
					<div class="post-tags">
						<a href="#">#star wars</a>
						<a href="#">#battlefront 2</a>
						<a href="#">#gameplay</a>
						<a href="#">#trailer</a>
						<a href="#">#galaxy</a>
					</div>
					<div class="social-share">
						<a class="btn btn-social btn-facebook btn-circle" href="#" data-toggle="tooltip" title="" data-placement="bottom" role="button" data-original-title="Share on facebook"><i class="fa fa-facebook"></i></a>
						<span>5.345k</span>
						<a class="btn btn-social btn-twitter btn-circle" href="#" data-toggle="tooltip" title="" data-placement="bottom" role="button" data-original-title="Share on twitter"><i class="fa fa-twitter"></i></a>
						<a class="btn btn-social btn-google-plus btn-circle" href="#" data-toggle="tooltip" title="" data-placement="bottom" role="button" data-original-title="Share on google-plus"><i class="fa fa-google-plus"></i></a>
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
					<span><i class="fa fa-eye"></i> 345x</span>
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