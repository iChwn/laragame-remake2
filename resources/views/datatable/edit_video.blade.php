@php
$user =Auth::user()->id;  
@endphp

@if($model->authors_id == $user)
{!! Form::model($model, ['url' => $form_url, 'method' => 'delete', 'class' => 'form-inline js-confirm', 'data-confirm' => $confirm_message] ) !!}
<a class="btn btn-outline-info" href="{{ $edit_url }}"> <i class="icon icon-edit"> Ubah</a></i>
{{-- {!! Form::submit('Hapus', ['class'=>'btn btn-xs btn-danger']) !!} --}}
{!! Form::close()!!}
@else

@endif