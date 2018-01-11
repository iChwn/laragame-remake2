@extends('layouts.app')
@section('content')

<!-- main -->
@foreach($vidio1 as $data)
<section class="bg-image" style="background-image: url('{{asset('/img/youtube/'.$data->cover)}}');">
    <div class="overlay"></div>
    <div class="container">
      <div class="video-play" data-src="{{$data->link}}">
        <div class="embed-responsive embed-responsive-16by9">
          <img class="embed-responsive-item" src="{{asset('/img/youtube/'.$data->cover)}}">
          <div class="video-caption">
            <h5>{{($data->judul)}}</h5>
            <span class="length">5:32</span>
          </div>
          <div class="video-play-icon">
            <i class="fa fa-play"></i>
          </div>
        </div>
      </div>
    </div>
  </section>
@endforeach

  <section class="toolbar">
    <div class="container">
      <h5><i class="fa fa-film"></i> Recent Videos <span>(123)</span></h5>
      <form method="post">
        <div class="form-group input-icon-right">
          <i class="fa fa-search"></i>
          <input type="text" class="form-control search-video form-control-secondary" id="search" placeholder="Search Video...">
        </div>
      </form>
      <a class="btn btn-secondary m-l-10 float-left hidden-md-down" href="#" role="button">Filter Videos <i class="fa fa-align-right"></i></a>
      <a class="btn btn-primary btn-shadow float-right hidden-sm-down" href="#" role="button">Upload Video <i class="fa fa-cloud-upload"></i></a>
    </div>
  </section>

<section>
    <div class="container">
      <div class="toolbar-custom">
        <a class="btn btn-default btn-icon m-r-10 float-left hidden-sm-down" href="#" data-toggle="tooltip" title="refresh" data-placement="bottom" role="button"><i class="fa fa-refresh"></i></a>
        <div class="dropdown float-left">
          <button class="btn btn-default" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">All Platform <i class="fa fa-caret-down"></i></button>
          <div class="dropdown-menu">
            <a class="dropdown-item active" href="#">All Platform</a>
            <a class="dropdown-item" href="#">Playstation 4</a>
            <a class="dropdown-item" href="#">Xbox One</a>
            <a class="dropdown-item" href="#">Origin</a>
            <a class="dropdown-item" href="#">Steam</a>
          </div>
        </div>

        <div class="btn-group float-right m-l-5 hidden-sm-down" role="group">
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
      <div class="row row-5">
      @foreach($vidio2 as $data)
        <div class="col-12 col-sm-6 col-md-3">
          <div class="card card-video">
            <div class="card-img">
              <a href="video-post.html">
                <img src="{{asset('/img/youtube/'.$data->cover)}}" alt="Tom Clancy's Ghost Recon: Wildlands">
              </a>
              <div class="card-meta">
                <span>4:32</span>
              </div>
            </div>
            <div class="card-block">
              <h4 class="card-title"><a href="video-post.html">Tom Clancy's Ghost Recon: Wildlands</a></h4>
              <div class="card-meta">
                <span><i class="fa fa-clock-o"></i> 2 hours ago</span>
                <span>423 views</span>
              </div>
              <p>Defeating the corrupt tyrants entrenched there will require not only strength.</p>
            </div>
          </div>
        </div>
        @endforeach
        </div>
        {!! str_replace('/?', '?', $vidio2->render()); !!}

        <div class="pagination-results m-t-10">
          <span>Showing 10 to 20 of 48 videos</span>
          <nav aria-label="Page navigation">
            <ul class="pagination">
              <li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true"><i class="fa fa-angle-left"></i></span></a></li>
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#"></a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">4</a></li>
              <li class="page-item"><a class="page-link" href="#">5</a></li>
              <li class="separate"><span>...</span></li>
              <li class="page-item"><a class="page-link" href="#">25</a></li>
              <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true"><i class="fa fa-angle-right"></i></span></a></li>
            </ul>
          </nav>
        </div>
      </div>
    </section>
    <!-- /main -->

@include('frontend.footer')
@endsection