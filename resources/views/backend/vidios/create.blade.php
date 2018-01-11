@extends('layouts.admin')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<ul class="breadcrumb">
				<li> <a href="{{url('/home')}}"> Dashboard </a> </li>
				<li> <a href="{{url('/admin/books')}}"> Vidios </a> </li>
				<li class="active"> Tambah Vidios </li>
			</ul>
			<div class="panel" style="background-color: rgba(255,255,255,0.9);">
				<div class="panel-heading">
					<h2 class="panel-title" >  Tambah Vidios </h2>
				</div>

				<div class="panel-body">
					{!! Form::open(['url'=>route('vidios.store'),
					'method'=>'post','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
					@include('backend/vidios._form')
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
