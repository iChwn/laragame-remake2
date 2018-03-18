<section class="p-t-35">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="toolbar-custom">
          <a class="btn btn-default btn-icon m-r-10 float-left hidden-xs-down" href="#" data-toggle="tooltip" title="refresh" data-placement="bottom" role="button"><i class="fa fa-refresh"></i></a>
          <div class="dropdown float-left">
            <button class="btn btn-default" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Semua Categori <i class="fa fa-caret-down"></i></button>
            <div class="dropdown-menu">
              @foreach($categori as $data)       
              <a class="dropdown-item" href="{{route('showperkategori', $data->id)}}">{!! $data->categori !!}
              </a>
              @endforeach
            </div>
          </div>

          {{-- <a class="btn btn-default btn-icon m-l-10 float-right hidden-xs-down" href="#" data-toggle="tooltip" title="list" data-placement="bottom" role="button"><i class="fa fa-bars"></i></a>
          <div class="dropdown float-right">
            <button class="btn btn-default" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Date Added <i class="fa fa-caret-down"></i></button>
            <div class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item active" href="#">Date Added</a>
              <a class="dropdown-item" href="#">Popular</a>
              <a class="dropdown-item" href="#">Newest</a>
              <a class="dropdown-item" href="#">Oldest</a>
            </div>
          </div> --}}
        </div>

        <!-- post -->

        @foreach($beritas as $data)
        @if($data->status<=0)
        
        @else
        <div class="post">
          <h2 class="post-title"><a href="{{route('show.show',$data->judul_slug)}}">{{$data->judul}}</a></h2>
          <div class="post-meta">
            <span><i class="fa fa-clock-o"></i> {{ date('d F, Y', strtotime($data->created_at)) }} by <a href="profile.html">{{($data->authors)}}</a></span>
            <span><a href="blog-post.html#comments"><i class="fa fa-eye"></i> {{($data->views)}} Views</a></span>
          </div>
          <div class="post-thumbnail">
            <img src="{{asset('/img/'.$data->cover)}}" alt="{{$data->judul_slug}}">
            <span class="badge badge-ps4">{{$data->categori->categori}}</span>
          </div>
          <p>{!! substr($data->deskripsi,0,300)."..." !!}</p>
          <a href="{{route('show.show',$data->judul_slug)}}" class="btn btn-danger btn-effect btn-shadow btn-rounded btn-lg">Read More..</a>
        </div>
        @endif
        @endforeach
        <div class="pagination-results">
          <span>Showing {{($beritas->count())}} News of {{($berita->count())}} results</span>
          <nav aria-label="Page navigation">
            <ul class="pagination">
              <li class="page-item active"> {!! str_replace('/?', '?', $beritas->render()); !!}</li>
            </ul>
          </nav>
        </div>
        <!-- /.post -->
      </div>

      <!-- sidebar -->
      <div class="col-lg-4">
        <div class="sidebar">
          <!-- widget-games -->

          <div class="widget widget-games">
            <h5 class="widget-title">Populer Berita</h5>
            @php $no=1; @endphp
            @foreach($populer as $data)
            @if($data->status<=0)

            @else
            <a href="{{route('show.show',$data->judul_slug)}}" style="background-image: url('{{asset('/img/'.$data->cover)}}')">
              <span class="overlay"></span>
              <div class="widget-block">
                <div class="count">{{$no++}}</div>
                <div class="description">
                  <h5 class="title">{{($data->judul)}}</h5>
                  <span class="date">{{ date('d F, Y', strtotime($data->created_at)) }}</span>
                </div>
              </div>
            </a>
            @endif
            @endforeach
          </div>
          
          <!-- widget post  -->
          <div class="widget widget-post">
            <h5 class="widget-title">Newest on Laragame</h5>
            @foreach($berita0 as $data)
            @if($data->status<=0)

            @else
            <a href="{{route('show.show',$data->judul_slug)}}"><img src="{{asset('/img/'.$data->cover)}}" alt=""></a>
            <h4><a href="{{route('show.show',$data->judul_slug)}}">{{($data->judul)}}</a></h4>
            <span><i class="fa fa-clock-o"></i> {{ date('d F, Y', strtotime($data->created_at)) }}</span>
            <p>{!! substr($data->deskripsi,0,200)."..." !!}</p>
            <ul class="widget-list">
              @endif
              @endforeach
            </div>

            <!-- widget facebook -->

            <div class="widget">
              <h5 class="widget-title">Chatango</h5>
              <div style="height: 450px;">
                <script id="cid0020000170316718598" data-cfasync="false" async src="//st.chatango.com/js/gz/emb.js" style="width: 100%;height: 100%;">{"handle":"laragame","arch":"js","styles":{"a":"000000","b":100,"c":"FFFFFF","d":"FFFFFF","k":"000000","l":"000000","m":"000000","n":"FFFFFF","p":"10","q":"000000","r":100,"cnrs":"0.35","fwtickm":1}}</script>
              </div>
            </div>

            <!-- widget post -->
            <div class="widget widget-post">
              <h5 class="widget-title">Lastest News</h5>
              <a href="blog-post.html"><img src="-" alt=""></a>
              <h4><a href="blog-post.html">judul</a></h4>
              <span><i class="fa fa-clock-o"></i> June 16, 2017</span>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer vel neque sed anter.</p>
              <ul class="widget-list">
                @foreach($berita3 as $data)
                @if($data->status<=0)

                @else
                <li>
                  <div class="widget-img"><a href="{{route('show.show',$data->judul_slug)}}"><img src="{{asset('/img/'.$data->cover)}}" alt=""></a></div>
                  <div>
                    <h4><a href="{{route('show.show',$data->judul_slug)}}">{{$data->judul}}</a></h4>
                    <span>{{ date('d F, Y', strtotime($data->created_at)) }}</span>
                  </div>
                </li>
                @endif
                @endforeach
              </ul>
            </div>

            <!-- widget tabs -->
            <div class="widget widget-gallery">
              <h5 class="widget-title">Galleries</h5>
              <ul>
                @foreach($berita1 as $data)
                @if($data->status<=0)

                @else
                <li>
                 <a href="{{asset('/img/'.$data->cover)}}" style="width: 350px; height: 200px;" data-lightbox='{"disqus": true, "gallery": "uncharted" }'>
                  <img src="{{asset('/img/'.$data->cover)}}" alt="">
                </a>
              </li>
              @endif
              @endforeach
            </ul>
            <a class="btn btn-primary btn-block m-t-15" href="{{url('/portfolio')}}" role="button">Liat Semua Galeri</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  </section