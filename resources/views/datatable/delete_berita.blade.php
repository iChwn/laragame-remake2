@php
$user =Auth::user()->id;  
@endphp

@if($model->authors_id == $user)
<button class="btn btn-outline-danger" data-toggle="modal" data-target="#warningModalAlertColored{{$model->id}}" type="button"> <i class="icon icon-trash-o"></i> Hapus</button>
{!! Form::model($model, ['url' => $form_url, 'method' => 'delete',] ) !!}
<div id="warningModalAlertColored{{$model->id}}" tabindex="-1" role="dialog" class="modal fade" >
	<div class="modal-dialog">
		<div class="modal-content bg-warning">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">×</span>
					<span class="sr-only">Close</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="text-center">
					<span class="icon icon-exclamation-triangle icon-5x"></span>
					<h3>Peringatan</h3>
					<p>Apakah Anda Ingin Menghapus Berita <u>{{$model->judul}}</u>
						<br>Klik "Hapus" Untuk Menghapus, Klik "Cancle" Untuk Membatalkan</p>
						<div class="m-t-lg">
							{!! Form::submit('Hapus', ['class'=>'btn btn-danger']) !!}
							<button class="btn btn-success" data-dismiss="modal" type="button">Cancel</button>
						</div>
					</div>
				</div>
				<div class="modal-footer"></div>
			</div>
		</div>
	</div>
	{!! Form::close()!!}
	@else

	@endif