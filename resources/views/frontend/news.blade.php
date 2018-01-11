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
        <div class="post">
          <h2 class="post-title"><a href="{{route('show.show',$data->judul_slug)}}">{{$data->judul}}</a></h2>
          <div class="post-meta">
            <span><i class="fa fa-clock-o"></i> {{ date('d F, Y', strtotime($data->created_at)) }} by <a href="profile.html">Admin</a></span>
            <span><a href="blog-post.html#comments"><i class="fa fa-eye"></i> {{($data->views)}} Views</a></span>
          </div>
          <div class="post-thumbnail">
            <img src="{{asset('/img/'.$data->cover)}}" alt="Uncharted The Lost Legacy First Gameplay Details Revealed">
            <span class="badge badge-ps4">{{$data->categori->categori}}</span>
          </div>
          <p>{!! substr($data->deskripsi,0,300)."..." !!}</p>
          <a href="{{route('show.show',$data->judul_slug)}}" class="btn btn-danger btn-effect btn-shadow btn-rounded btn-lg">Read More..</a>
        </div>
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
            @endforeach
          </div>

          <!-- widget post  -->
           <div class="widget widget-post">
            <h5 class="widget-title">Newest on Gameforest</h5>
            @foreach($berita0 as $data)
            <a href="{{route('show.show',$data->judul_slug)}}"><img src="{{asset('/img/'.$data->cover)}}" alt=""></a>
            <h4><a href="{{route('show.show',$data->judul_slug)}}">{{($data->judul)}}</a></h4>
            <span><i class="fa fa-clock-o"></i> {{ date('d F, Y', strtotime($data->created_at)) }}</span>
            <p>{!! substr($data->deskripsi,0,200)."..." !!}</p>
            <ul class="widget-list">
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
              <h5 class="widget-title">Newest</h5>
              <a href="blog-post.html"><img src="-" alt=""></a>
              <h4><a href="blog-post.html">judul</a></h4>
              <span><i class="fa fa-clock-o"></i> June 16, 2017</span>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer vel neque sed anter.</p>
              <ul class="widget-list">
                <li>
                  <div class="widget-img"><a href="blog-post.html"><img src="img/blog/blog-widget-1.jpg" alt=""></a></div>
                  <div>
                    <h4><a href="blog-post.html">Dead Island 2 and Escape Impressions</a></h4>
                    <span>June 16, 2017</span>
                  </div>
                </li>
                <li>
                  <div class="widget-img"><a href="blog-post.html"><img src="img/blog/blog-widget-2.jpg" alt=""></a></div>
                  <div>
                    <h4><a href="blog-post.html">How to Finish Mafia 3 With All of Your Underbosses</a></h4>
                    <span>May 30, 2017</span>
                  </div>
                </li>
                <li>
                  <div class="widget-img"><a href="blog-post.html"><img src="img/blog/blog-widget-3.jpg" alt=""></a></div>
                  <div>
                    <h4><a href="blog-post.html">Spider-Man Spin-Off, Venom, Gets Release Date</a></h4>
                    <span>June 10, 2017</span>
                  </div>
                </li>
                <li>
                  <div class="widget-img"><a href="blog-post.html"><img src="img/blog/blog-widget-4.jpg" alt=""></a></div>
                  <div>
                    <h4><a href="blog-post.html">Is Ghost Recon: Wildlands Worth Your Time?</a></h4>
                    <span>June 16, 2017</span>
                  </div>
                </li>
              </ul>
            </div>

            <!-- widget tabs -->
          <div class="widget widget-tabs">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item"><a class="nav-link active" href="#comments" aria-controls="comments" role="tab" data-toggle="tab"><i class="fa fa-comment-o"></i> Comments</a></li>
              <li class="nav-item"><a class="nav-link" href="#popular" aria-controls="popular" role="tab" data-toggle="tab">Popular</a></li>
              <li class="nav-item"><a class="nav-link" href="#recent" aria-controls="recent" role="tab" data-toggle="tab">Recent</a></li>
            </ul>
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="comments">
                <ul class="widget-comments">
                  <li>
                    <div><a href="profile.html"><img src="img/user/user-2.jpg" alt=""></a></div>
                    <div>
                      <a href="blog-post.html#comments"><b>Elizabeth:</b> It would have taken a ridiculous amount of careful precise actions.</a>
                    </div>
                  </li>
                  <li>
                    <div><a href="profile.html"><img src="img/user/user-3.jpg" alt=""></a></div>
                    <div>
                      <a href="blog-post-disqus.html#comments"><b>Clark:</b> Lorem ipsum dolor sit amet, consectetur adipiscing elit curabitur risque.</a>
                    </div>
                  </li>
                  <li>
                    <div><a href="profile.html"><img src="img/user/user-1.jpg" alt=""></a></div>
                    <div>
                      <a href="blog-post-video.html#comments"><b>Venom:</b> Practically no verticality, which on levels like The Spire (Geonosis) incredible.</a>
                    </div>
                  </li>
                  <li>
                    <div><a href="profile.html"><img src="img/user/user-3.jpg" alt=""></a></div>
                    <div>
                      <a href="blog-post-disqus.html#comments"><b>Clark:</b> I'm low level at this point and have almost nothing unlocked, and veteran players have an unfair advantage over me thanks.</a>
                    </div>
                  </li>
                  <li>
                    <div><a href="profile.html"><img src="img/user/user-5.jpg" alt=""></a></div>
                    <div>
                      <a href="blog-post-disqus.html#comments"><b>Trevor:</b> A lot of people would have stopped playing now if it wasn't for the online stuff!</a>
                    </div>
                  </li>
                </ul>
              </div>
              <div role="tabpanel" class="tab-pane" id="popular">
                <div class="widget-post">
                  <ul class="widget-list">
                    <li>
                      <img src="../../i1.ytimg.com/vi/B6qY-P4eo1Q/mqdefault.jpg" alt="">
                      <h4><a href="blog-post.html">How to Finish Mafia 3 With All of Your Underbosses</a></h4>
                      <span><i class="fa fa-clock-o"></i> July 12, 2017</span>
                      <span>19 comments</span>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer vel neque sed anter.</p>
                    </li>
                    <li>
                      <h4><a href="blog-post.html">Uncharted: The Lost Legacy's Demo</a></h4>
                      <span>June 28, 2017</span>
                      <span>41 comments</span>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer vel neque sed anter.</p>
                    </li>
                    <li>
                      <h4><a href="blog-post.html">Mafia III Stones Unturned DLC Launch Trailer</a></h4>
                      <span>June 17, 2017</span>
                      <span>7 comments</span>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer vel neque sed anter.</p>
                    </li>
                  </ul>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane" id="recent">
                <div class="widget-post">
                  <ul class="widget-list">
                    <li>
                      <img src="../../i1.ytimg.com/vi/ckUrcdnWZ2g/mqdefault.jpg" alt="">
                      <h4><a href="blog-post.html">Free Mass Effect: Andromeda Trial Now Available On All Platforms</a></h4>
                      <span><i class="fa fa-clock-o"></i> July 12, 2017</span>
                      <span>76 comments</span>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer vel neque sed anter.</p>
                    </li>
                    <li>
                      <h4><a href="blog-post.html">GTA 5 Online Players Find Secret Alien Mission</a></h4>
                      <span>June 23, 2017</span>
                      <span>34 comments</span>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer vel neque sed anter.</p>
                    </li>
                    <li>
                      <h4><a href="blog-post.html">Mafia III Stones Unturned DLC Launch Trailer</a></h4>
                      <span>June 17, 2017</span>
                      <span>7 comments</span>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer vel neque sed anter.</p>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </section