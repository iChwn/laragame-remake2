<button class="btn btn-outline-primary " data-toggle="modal" data-target="#modalFlipInY{{$model->id}}" type="button"> <i class="icon icon-eye"></i> Show</button>
<div id="modalFlipInY{{$model->id}}" tabindex="-1" role="dialog" class="modal fade bs-example-modal-lg">
	<div class="modal-dialog modal-lg">
		<div class="modal-content animated rollIn">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">×</span>
					<span class="sr-only">Close</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="text-center">
					<div class="col-lg-12">
						<!-- post -->
						<div class="post post-single">
							<h2 class="post-title">{{$model->judul}}</h2>
							<div class="post-meta">
								<span><i class="fa fa-clock-o"></i> {{ date('d F, Y', strtotime($model->created_at)) }} by <a href="profile.html">Constantine</a></span>
								<span><a href="#comments"><i class="fa fa-comment-o"></i> 98 comments</a></span>
							</div>
							<div class="post-thumbnail">
								<img src="{{asset('/img/'.$model->cover)}}" alt="Uncharted The Lost Legacy First Gameplay Details Revealed" style="width: 800px; height: 450px;">
								<p style="height: 30px;"></p>
							</div>
							<p>{!!$model->deskripsi!!}</p>
							<blockquote class="blockquote">
								<p>“{{$model->spoiler}}”</p>
							</blockquote>
							<p>Maecenas viverra, mi non consectetur scelerisque, erat enim interdum erat, imperdiet elementum sapien metus a odio. Sed sapien sapien, tincidunt quis fringilla vel, eleifend tincidunt nunc. Fusce dapibus leo vestibulum, scelerisque metus nec, imperdiet
								tortor.usce et urna vel neque fermentum consectetur. Donec vel convallis elit. Nulla et odio a magna aliquam varius a vel ex. Cras sed dolor sapien. Sed sit amet interdum sapien, ut laoreet dui. Fusce vulputate consequat mi et rutrum.</p>
							</div>		
						</div>
						<div class="m-t-lg">
							<button class="btn btn-warning" data-dismiss="modal" type="button">Close</button>
						</div>
					</div>
				</div>
				<div class="modal-footer"></div>
			</div>
		</div>
	</div>
</div>
</div>
</div>