@extends('layouts.app')

<!-- Main Content -->
@section('content')
<section class="p-b-0">
  <div class="container">
    <div class="heading">
      <i class="fa fa-envelope-open-o"></i>
      <h2>Periksa E-mail Anda</h2>
      <p>Pesan akan terkirim dalam waktu sekitar <u>5 Menit</u> oke ;)</p>
  </div>
</div>
</section>

<section class="p-t-10">
    <div class="container">
      <div class="row">
        <div class="col-lg-7 mx-auto">
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="form-group">
          <label for="email">Email</label>
          {!! Form::open(['url'=>'/password/email', 'class'=>'form-horizontal'])!!}
          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <div class="col-md-14">
                {!! Form::email('email', null, ['class'=>'form-control','placeholder'=>'Masukan email anda']) !!}
                {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary btn-lg btn-rounded btn-effect btn-shadow float-right">
        <i class="fa fa-btn fa-envelope"></i> Kirim link reset password
    </button>
    {!! Form::close() !!}
</div>
</div>
</div>
</section>
@include('frontend.footer')
@endsection

