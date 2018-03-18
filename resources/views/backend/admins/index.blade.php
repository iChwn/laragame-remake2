@extends('layouts.admin')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<ul class="breadcrumb">
				<li><a href="{{ url('/home') }}">Dashboard</a></li>
				<li class="active">Berita</li>
			</ul>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2 class="panel-title">Berita</h2>
				</div>
				<div class="panel-body">
				{{-- <button class="btn btn-outline-success " data-toggle="modal" data-target="#modalFlipInX" type="button"><i class="icon icon-plus-square-o"></i> Tambah</button>
					{!! Form::open(['url'=>route('beritas.store'),
					'method'=>'post','class'=>'form-horizontal']) !!}
					<div id="modalFlipInX" tabindex="-1" role="dialog" class="modal fade bs-example-modal-lg">
						<div class="modal-dialog modal-xs" role="document">
							<div class="modal-content animated flipInX">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">
										<span aria-hidden="true">×</span>
										<span class="sr-only">Close</span>
									</button>
								</div>
								<div class="modal-body">
									<div class="text-center">
										@include('backend/beritas._form')
										<div class="m-t-lg">
											{!! Form::button('<i class="icon icon-save"></i> Simpan', ['type' => 'submit', 'class' => 'btn btn-primary '] )  !!}
											<button class="btn btn-default" data-dismiss="modal" type="button">Cancel</button>
											{!! Form::close() !!}
										</div>
									</div>
								</div>
								<div class="modal-footer"></div>
							</div>
						</div>
					</div> --}}
					<p><a class="btn btn-outline-success  " href="{{url('/super/pengurus/create')}}">
						<i class="icon icon-plus-square-o"></i> Tambah</a></p>
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