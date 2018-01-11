
<button class="btn btn-outline-info " data-toggle="modal" data-target="#modalFlipInX{{$model->id}}" type="button"> <i class="icon icon-refresh"></i> Edit</button>
{!! Form::model($model, ['url' => route('beritas.update', $model->id),
'method'=>'put', 'class'=>'form-horizontal']) !!}

<div id="modalFlipInX{{$model->id}}" tabindex="-1" role="dialog" class="modal fade bs-example-modal-lg">
	<div class="modal-dialog modal-lg">
		<div class="modal-content animated flipInY">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">×</span>
					<span class="sr-only">Close</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="text-center">
					<p>@include('backend/beritas._form')</p>
					<div class="m-t-lg">
						{!! Form::button('<i class="icon icon-save"></i> Simpan', ['type' => 'submit', 'class' => 'btn btn-primary '] )  !!}
						<button class="btn btn-default" data-dismiss="modal" type="button">Cancel</button>
						
					</div>
				</div>
			</div>
			<div class="modal-footer"></div>
		</div>

		{!! Form::close() !!}