@extends('layouts.admin')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<ul class="breadcrumb">
				<li><a href="{{ url('/home') }}">Dashboard</a></li>
				<li class="active">Vidio</li>
			</ul>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2 class="panel-title">Vidio</h2>
				</div>
				<div class="panel-body">
					<p><a class="btn btn-primary " href="{{url('/admin/vidios/create')}}">
						<i class="fa fa-btn fa-plus-circle"></i> Tambah</a></p>
						{!! $html->table(['class'=>'table-striped']) !!}
					</div>
				</div>
			</div>
		</div>
	</div>
	@endsection

	@section('scripts')
	{!! $html->scripts() !!}
	@endsection