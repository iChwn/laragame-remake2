@extends('layouts.app')
@section('content')

<section>
  <div class="container">
    <div class="toolbar-custom">
      <a class="btn btn-default btn-icon m-r-10 float-left hidden-xs-down" href="#" data-toggle="tooltip" title="refresh" data-placement="bottom" role="button"><i class="fa fa-refresh"></i></a>
      <input type="reset" name="">
      <div class="dropdown float-left">
            <button class="btn btn-default" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Semua Categori <i class="fa fa-caret-down"></i></button>
            <div class="dropdown-menu">
              @foreach($categori as $data)       
              <a class="dropdown-item" href="#">{!! $data->categori !!}
              </a>
              @endforeach
            </div>
          </div>

      <div class="btn-group float-right m-l-5 hidden-xs-down" role="group">
        <a class="btn btn-default btn-icon" href="#" role="button"><i class="fa fa-th-large"></i></a>
        <a class="btn btn-default btn-icon" href="#" role="button"><i class="fa fa-bars"></i></a>
      </div>

      <div class="dropdown float-right">
        <button class="btn btn-default" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Date Added <i class="fa fa-caret-down"></i></button>
        <div class="dropdown-menu dropdown-menu-right">
          <a class="dropdown-item active" href="#">Date Added</a>
          <a class="dropdown-item" href="#">Popular</a>
          <a class="dropdown-item" href="#">Newest</a>
          <a class="dropdown-item" href="#">Oldest</a>
        </div>
      </div>
    </div>
    <div class="row row-3 figure-effect">
    @foreach($berita as $data)
      <div class="col-12 col-sm-6 col-md-4">
        <figure>
          <div class="figure-img">
            <a href="{{asset('/img/'.$data->cover)}}" style="width: 400px; height: 200px;" data-lightbox='{"disqus": true, "gallery": "uncharted" }'>
              <img src="{{asset('/img/'.$data->cover)}}" alt="">
            </a>
            <a class="figure-likes" href="#">{{$data->judul}}</a>
          </div>
        </figure>
      </div>
      @endforeach
    </div>
    {{-- <div class="text-center m-t-30"><a class="btn btn-primary btn-shadow btn-rounded btn-effect btn-lg" href="#">Show More</a></div> --}}
  </div>
</section>
@endsection