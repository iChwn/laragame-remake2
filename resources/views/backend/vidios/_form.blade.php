<div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
	{!! Form::label('judul', 'Judul', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('judul', null, ['class'=>'form-control']) !!}
		{!! $errors->first('judul', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('link') ? ' has-error' : '' }}">
	{!! Form::label('link', 'Link', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('link', null, ['class'=>'form-control']) !!}
		{!! $errors->first('link', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('link_id') ? ' has-error' : '' }}">
	{!! Form::label('link_id', 'Link ID', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('link_id', null, ['class'=>'form-control']) !!}
		{!! $errors->first('link_id', '<p class="help-block">:message</p>') !!}
	</div>
</div>


<div class="form-group{{ $errors->has('berita_id') ? ' has-error' : '' }}">
	{!! Form::label('berita_id', 'Berita', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::select('berita_id',[''=>'']+App\Berita::pluck('judul','id')->all(), null,['class'=>'form-control'])  !!}
		{!! $errors->first('berita_id', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('cover') ? ' has-error' : '' }}">
	{!! Form::label('cover','Cover(1280x800)',['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::file('cover',['class'=>'btn btn-default']) !!}

		@if(isset($berita) && $berita->cover)
		<p>
        {!! Html::image(asset('/img/youtube/'.$berita->cover.''),null,['class'=>'img-rounded img-responsive'])!!}
		</p>
		@endif
		{!! $errors->first('cover', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group">
	<div class="col-md-4 col-md-offset-2">
		
		{!! Form::button('<i class="fa fa-save"></i> Simpan', ['type' => 'submit', 'class' => 'btn btn-primary btn-sm'] )  !!}
	</div>
</div>
