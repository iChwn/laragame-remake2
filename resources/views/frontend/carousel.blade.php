<!-- main -->
<section class="p-y-5">
  <div class="owl-carousel owl-posts">
    @foreach($berita1 as $data)
    <div class="post-carousel">
      <a href="{{route('show.show',$data->judul_slug)}}"><img src="{{asset('/img/'.$data->cover)}}"  style="width: 670px; height: 400px;" alt=""></a>
      <span class="badge badge-ps4">{{$data->categori->categori}}</span>
      <div class="post-block">
        <div class="post-caption">
          <h2 class="post-title">
            <a href="{{route('show.show',$data->judul_slug)}}">{{$data->judul}}</a>
          </h2>
          <div class="post-meta">
            <span><i class="fa fa-clock-o"></i> {{ date('d F, Y', strtotime($data->created_at)) }} by <a href="profile.html">Admin</a></span>
            <span><a href="blog-post.html#comments"><i class="fa fa-eye"></i> {{($data->views)}} Views</a></span>
          </div>
        </div>
      </div>
    </div>
    @endforeach

  </div>
</section>

{{-- Sementara --}}
<section class="bg-secondary p-t-15 p-b-5 p-x-15">
  <div class="owl-carousel owl-videos">
    @foreach($vidios as $data)
    <div class="card card-video">
      <div class="card-img">
        <a href="{{route('vidios',$data->judul)}}">
          <img src="{{asset('/img/youtube/'.$data->cover)}}" alt="{{asset('/img/youtube/'.$data->cover)}}">
        </a>
        <div class="card-meta">
          <span>4:32</span>
        </div>
      </div>
      <div class="card-block">
        <h4 class="card-title"><a href="{{($data->link)}}">{{($data->judul)}}</a></h4>
        <div class="card-meta">
          <span><i class="fa fa-clock-o"></i> 2 hours ago</span>
          <span>423 views</span>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</section>
