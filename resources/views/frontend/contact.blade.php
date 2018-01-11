@extends('layouts.app')
@section('content')

<section class="p-b-0">
  <div class="container">
    <div class="heading">
      <i class="fa fa-envelope-open-o"></i>
      <h2>Get in touch with us</h2>
      <p>Berikanlah Saran & Kritikan dengan kalimat yang <u>SOPAN</u> oke ;)</p>
    </div>
  </div>
</section>

<section class="p-t-10">
  <div class="container">
    <div class="row">
      <div class="col-lg-7 mx-auto">
        <form method="post">
          <div class="alert alert-success alert-dismissible" role="alert" hidden="">
            @if(Session::has('status'))
            <div class="alert alert-success">{{ Session::get('status') }}</div>
            @endif
          </div>

          {{ csrf_field() }}

          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            {!! Form::label('email', 'Email', ['class'=>'col-md-2 control-label']) !!}
            <div class="col-md-13">
              {!! Form::email('email', null, ['class'=>'form-control','placeholder'=>'E-mail', 'min'=>1]) !!}
              {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                {!! Form::label('name', 'Name', ['class'=>'col-md-2 control-label']) !!}
                <div class="col-md-13">
                  {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Nama', 'min'=>1]) !!}
                  {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group{{ $errors->has('model') ? ' has-error' : '' }}">
              {!! Form::label('model', 'Subject', ['class'=>'col-md-2 control-label']) !!}
                <div class="col-md-13">
                  {!! Form::text('model', null, ['class'=>'form-control','placeholder'=>'Subject', 'min'=>1]) !!}
                  {!! $errors->first('model', '<p class="help-block">:message</p>') !!}
                </div>
              </div>
              {{-- <div class="form-group">
                <label for="subject">Subject</label>
                <select id="subject" class="form-control select2">
                  <option>General</option>
                  <option>Partnership</option>
                  <option>Report Bug</option>
                  <option>Support</option>
                </select>
              </div> --}}
            </div>
          </div>
          <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
            {!! Form::label('message', 'Pesan', ['class'=>'col-md-2 control-label']) !!}
            <div class="col-md-13">
              {!! Form::textarea('message', null, ['class'=>'form-control','placeholder'=>'Pesan Untuk Kami', 'min'=>1]) !!}
              {!! $errors->first('message', '<p class="help-block">:message</p>') !!}
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-lg btn-rounded btn-effect btn-shadow float-right">Submit</button>
        </form>
      </div>
    </div>
  </div>
</section>
@include('frontend.footer')
@endsection