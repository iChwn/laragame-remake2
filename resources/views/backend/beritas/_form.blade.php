<style type="text/css">
	.hidden{display:none;}
</style>
@php
$user =Auth::user()->name;  
@endphp
<b>Diupload Oleh </b> <i>{{($user)}}</i>
<p></p>
<div class="form-group{{ $errors->has('authors') ? ' has-error' : '' }}" hidden="true">
	{!! Form::label('authors', 'Authors', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('authors', $user, ['class'=>'form-control']) !!}
		{!! $errors->first('authors', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
	{!! Form::label('judul', 'Judul', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('judul', null, ['class'=>'form-control']) !!}
		{!! $errors->first('judul', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('spoiler') ? ' has-error' : '' }}">
	{!! Form::label('spoiler', 'Spoiler', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('spoiler', null, ['class'=>'form-control']) !!}
		{!! $errors->first('spoiler', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('categori_id') ? ' has-error' : '' }}">
	{!! Form::label('categori_id', 'Categori', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::select('categori_id',[''=>'']+App\Categori::pluck('categori','id')->all(), null,['class'=>'form-control'])  !!}
		{!! $errors->first('categori_id', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('deskripsi') ? ' has-error' : '' }}">
	{!! Form::label('deskripsi', 'Deskripsi', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-8">
		{!! Form::textarea('deskripsi', null, ['class'=>'form-control']) !!}
		{!! $errors->first('deskripsi', '<p class="help-block">:message</p>') !!}
	</div>
</div>
 <input name="image" type="file" id="upload" class="hidden" onchange="">
<div class="form-group{{ $errors->has('deskripsi2') ? ' has-error' : '' }}">
	{!! Form::label('deskripsi2', 'Deskripsi 2', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-8">
		{!! Form::textarea('deskripsi2', null, ['class'=>'form-control']) !!}
		{!! $errors->first('deskripsi2', '<p class="help-block">:message</p>') !!}
	</div>
</div>

{{-- <div class="form-group{{ $errors->has('views') ? ' has-error' : '' }}" hidden="">
	{!! Form::label('views', 'views', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-8">
		{!! Form::number('views', 0, ['class'=>'form-control','value'=>'0']) !!}
		{!! $errors->first('views', '<p class="help-block">:message</p>') !!}
	</div>
</div> --}}

<div class="form-group{{ $errors->has('cover') ? ' has-error' : '' }}">
	{!! Form::label('cover','Cover(1280x800)',['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::file('cover',['class'=>'btn btn-default']) !!}

		@if(isset($berita) && $berita->cover)
		<p>
			{!! Html::image(asset('/img/'.$berita->cover.''),null,['class'=>'img-rounded img-responsive'])!!}
		</p>
		@endif
		{!! $errors->first('cover', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('tags') ? ' has-error' : '' }}">
	{!! Form::label('tags', 'tags', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		<input data-role="tagsinput" type="text" name="tags" >
			@if ($errors->has('tags'))
                <span class="text-danger">{{ $errors->first('tags') }}</span>
            @endif
		{!! $errors->first('tags', '<p class="help-block">:message</p>') !!}
	</div>
</div>



<div class="form-group">
	<div class="col-md-4 col-md-offset-2">
		
		{!! Form::button('<i class="fa fa-save"></i> Simpan', ['type' => 'submit', 'class' => 'btn btn-primary btn-sm'] )  !!}
	</div>
</div>
