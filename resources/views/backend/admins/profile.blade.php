@extends('layouts.admin')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<ul class="breadcrumb">
				<li><a href="{{ url('/home') }}">Dashboard</a></li>
				<li class="active">Profil</li>
			</ul>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2 class="panel-title">Profil</h2>
				</div>
				<div class="panel-body">
					<table class="table">
						<tbody>
							<tr>
								<td class="text-muted">Nama</td>
								<td>{{ auth()->user()->name }}</td>
							</tr>
							<tr>
								<td class="text-muted">Email</td>
								<td>{{ auth()->user()->email }}</td>
							</tr>
						</tbody>
					</table>
					<a class="btn btn-outline-success  " href="{{ url('/settings/profile/edit') }}">
						<i class="icon icon-plus-square-o"></i> Edit</a></p>
					<a class="btn btn-outline-success" href="{{ url('/settings/password') }}"> Ubah Password</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection