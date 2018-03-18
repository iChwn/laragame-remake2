<!DOCTYPE html>
<html lang="en">
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
  <body>
    <div id="app">
     <!-- header -->
     <header id="header">
      <div class="container">
        <div class="navbar-backdrop">
          <div class="navbar">
            <div class="navbar-left">
              <a class="navbar-toggle"><i class="fa fa-bars"></i></a>
              <a href="{{ url('/') }}" class="logo"><img src="{{asset('/template/img/logo2.png')}}" alt="Laragame\remake"></a>
              <nav class="nav">
                <ul>
                  <li class="has-dropdown">
                  <a href="#">Categori</a>
                    <ul>
                      @if(isset($categori))
                      @foreach($categori as $data)       
                      <li><a href="{{route('showperkategori', $data->id)}}">{!! $data->categori !!}</a></li>
                      @endforeach
                      @endif
                    </ul>
                  </li>
                  <li><a href="{{url('/portfolio')}}" class="page-scroll">Galeri</a></li>
                  <li><a href="{{url('/blog')}}" class="page-scroll">Blog</a></li>
                  <li><a href="{{url('/contact')}}" class="page-scroll">Contact ME!</a></li>
                  <li class="has-dropdown mega-menu mega-games">
                    <a href="games.html">Latest News</a>
                    <ul>
                      <li>
                        <div class="container">
                          <div class="row">
                            @if(isset($berita2))
                            @foreach($berita2 as $data)
                            <div class="col">
                              <div class="img">
                                <a href="{{route('show.show',$data->judul_slug)}}"><img src="{{asset('/img/'.$data->cover)}}" alt="Last of Us: Part 2" style="width: 270px;height: 170px;"></a>
                                <span class="badge badge-ps4">{{$data->categori->categori}}</span>
                              </div>
                              <h4><a href="{{route('show.show',$data->judul_slug)}}">{{($data->judul)}}</a></h4>
                              <span>{{ date('d F, Y', strtotime($data->created_at)) }}</span>
                            </div>
                            @endforeach
                            @endif
                          </div>
                        </div>
                      </li>
                    </ul>
                  </li>
                </ul>
              </nav>
            </div>
            <div class="nav navbar-right">
              <ul>
                <li>
                  <form action="{{url('/search')}}" method="post" class="search-form">
                  </i>
                  <button name="Submit" type="submit" title="Search" class="search-button" hidden="hidden"><i class="fa fa-search fa-lg"></i></button>
                  <input name="search_code" type="text" placeholder="Search News..." class="form-control search-field">
                  <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                </form>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="navbar-search">
        <div class="container">
          <form method="post">
            <input type="text" class="form-control" placeholder="Search...">
            <i class="fa fa-times close"></i>
          </form>
        </div>
      </div>
    </div>
  </header>

  @yield('content')
</div>

<!-- Scripts -->
{{-- <script src="/js/app.js"></script> --}}
{{-- SweetyAlert --}}
<script src="{{asset('/dist/sweetalert.min.js')}}"></script>
@include('sweet::alert')
<script id="dsq-count-scr" src="//laragame-remake-1.disqus.com/count.js" async></script>
<!-- vendor js -->
<script src="{{asset('/template/plugins/jquery/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('/template/plugins/popper/popper.min.js')}}"></script>
<script src="{{asset('/template/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- Lightbox -->
<script src="{{asset('/template/plugins/lightbox/lightbox.js')}}"></script>
<script>
  (function($) {
    "use strict";
    // lightbox
    $('[data-lightbox]').lightbox({
      disqus: 'laragame-remake'
    });
  })(jQuery);
</script>
<!-- plugins js -->
<script src="{{asset('/template/plugins/owl-carousel/js/owl.carousel.min.js')}}"></script>
<script>
  (function($) {
    "use strict";
    // owl carousel
    $('.owl-posts').owlCarousel({
      margin: 5,
      loop: true,
      dots: false,
      autoplay: true,
      responsive: {
        0: {
          items: 1
        },
        1024: {
          items: 1,
          center: false
        },
        1200: {
          items: 2,
          center: true
        }
      }
    });

    $('.owl-videos').owlCarousel({
      margin: 15,
      loop: true,
      dots: false,
      responsive: {
        0: {
          items: 1
        },
        700: {
          items: 2
        },
        800: {
          items: 3
        },
        1000: {
          items: 4
        },
        1200: {
          items: 6
        }
      }
    });
  })(jQuery);
</script>
<!-- theme js -->
<script src="{{asset('/template/js/theme.min.js')}}"></script>
{{-- Disqus --}}
<script id="dsq-count-scr" src="//laragame-remake.disqus.com/count.js" async></script>

@yield('scripts')
</body>
</html>
