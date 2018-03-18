<footer id="footer">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-5">
				<h4 class="footer-title">About Laragame\remake</h4>
				<p>Laragame\remake adalah sebuah web yang dulunya bernama 'Laragame'
					Namun kini di buat kembali dengan nama yang berbeda yaitu 'Laragame\remake'.</p>
					<p>Web ini memberikan informasi berita seputar game yang terupdate setiap harinya
						dan dengan tampilan yang di rombak memberikan kesan yang lebih memukau.</p>
					</div>
					<div class="col-sm-12 col-md-3">
						<h4 class="footer-title">Platform</h4>
						<div class="row">
							<div class="col">
								<ul>
									@if(isset($categori))
									@foreach($categori as $data)       
									<li><a href="{{route('showperkategori', $data->id)}}">{!! $data->categori !!}</a></li>
									@endforeach
									@endif
								</ul>
							</div>
					{{-- <div class="col">
						<ul>
							<li><a href="games.html">Games</a></li>
							<li><a href="reviews.html">Reviews</a></li>
							<li><a href="videos.html">Videos</a></li>
							<li><a href="forums.html">Forums</a></li>
						</ul>
					</div> --}}
				</div>
			</div>
			{{-- <div class="col-sm-12 col-md-4">
				<h4 class="footer-title">Subscribe</h4>
				<p>Subscribe to our newsletter and get notification when new games are available.</p>
				<div class="input-group m-t-25">
					<input type="text" class="form-control" placeholder="Email">
					<span class="input-group-btn">
						<button class="btn btn-primary" type="button">Subscribe</button>
					</span>
				</div>
			</div> --}}
		</div>
		<div class="footer-bottom">
			<div class="footer-social">
				<a href="#" target="_blank" data-toggle="tooltip" title="facebook"><i class="fa fa-facebook"></i></a>
				<a href="#" target="_blank" data-toggle="tooltip" title="twitter"><i class="fa fa-twitter"></i></a>
				<a href="#" target="_blank" data-toggle="tooltip" title="steam"><i class="fa fa-steam"></i></a>
				<a href="#" target="_blank" data-toggle="tooltip" title="twitch"><i class="fa fa-twitch"></i></a>
				<a href="#" target="_blank" data-toggle="tooltip" title="youtube"><i class="fa fa-youtube"></i></a>
			</div>
			<p>Copyright &copy; 2017 <a href="https://themeforest.net/item/gameforest-responsive-gaming-html-theme/5007730" target="_blank">Laragae\remake</a>. All rights reserved.</p>
		</div>
	</div>
</footer>