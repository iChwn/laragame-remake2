<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <!-- Styles -->
  {{-- <link href="/css/app.css" rel="stylesheet"> --}}
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
  <link rel="stylesheet" href="{{asset('/template/plugins/font-awesome/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('/template/plugins/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('/template/plugins/animate/animate.min.css')}}">
  <!-- plugins css -->
  <link href="{{asset('/template/plugins/owl-carousel/css/owl.carousel.min.css')}}" rel="stylesheet">
  <!-- theme css -->
  <link rel="stylesheet" href="{{asset('/template/css/theme.min.css')}}">
  <link rel="stylesheet" href="{{asset('/template/css/custom.css')}}">
  {{-- Sweetalert --}}
  <link rel="stylesheet" href="{{asset('/dist/sweetalert.css')}}">
  {{-- Vaf icon --}}
  <link rel="shortcut icon" href="{{asset('/LG2.png')}}"/>
  <!-- Scripts -->
  <script>
    window.Laravel = <?php echo json_encode([
      'csrfToken' => csrf_token(),
      ]); ?>
    </script>
  </head>
<section class="bg-image bg-image-md" style="background-image: url({{asset('/template/img/bg/bg-login.jpg')}}); height: 700px;">
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
