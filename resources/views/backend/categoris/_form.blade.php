<div class="form-group{{$errors->has('categori')?'has-error':''}}">
	{!! Form::label('categori','Categori',['class'=>'']) !!}
	
		{!! Form::text('categori',null,['class'=>'form-control']) !!}
		{!! $errors->first('categori','<p class="help-block">:message</p>') !!}
	
</div>

<div class="form-group hidden">
	<div class="col-md-4 col-md-offset-2">
		{!! Form::button('<i class="icon icon-save"></i> Simpan', ['type' => 'submit', 'class' => 'btn btn-primary '] )  !!}
	</div>
</div>