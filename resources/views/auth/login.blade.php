@extends('layouts.app')

@section('content')
<section class="bg-image bg-image-sm" style="background-image: url({{asset('/template/img/bg/bg-login.jpg')}});">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-8 col-md-4 mx-auto">
                <div class="card m-b-0">
                    <div class="card-header">
                        <h4 class="card-title"><i class="fa fa-sign-in"></i> Login to your account</h4>
                    </div>
                    <div class="card-block">

                        <div class="divider">
                            <span>Welcome</span>
                        </div>
                        {!! Form::open(['url'=>'login', 'class'=>'form-horizontal']) !!}
                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                            {!! Form::label('email', 'Alamat Email', ['class'=>'col-md-1 control-label sr-only']) !!}
                            <i class="fa fa-user"></i>
                            {!! Form::email('email', null, ['placeholder'=>'Email address','class'=>'form-control']) !!}
                            {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                            {!! Form::label('password', 'Password', ['class'=>'col-md-1 control-label sr-only']) !!}
                            <i class="fa fa-lock"></i>
                            {!! Form::password('password', ['placeholder'=>'Password','class'=>'form-control']) !!}
                            {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                        </div>
                        <label class="custom-control custom-checkbox custom-checkbox-primary">

                            {!! Form::checkbox('remember')!!} Ingat saya
                        </label>
                        <button type="submit" class="btn btn-primary btn-block m-t-10">Login <i class="fa fa-sign-in"></i></button>
                        <div class="divider">
                            <a class="btn btn-link" href="{{ url('/password/reset') }}">Lupa Password ?</a>
                        </div>
                        {!! Form::close() !!}
                    </div>

                </div>

            </div>
        </div>
    </div>
</section>
@include('frontend.footer')

@endsection
