<!-- main -->
@php
use Alaouy\Youtube\Facades\Youtube;
@endphp

<section class="p-y-5">
  <div class="owl-carousel owl-posts">
    @foreach($berita1 as $data)
    @if($data->status<=0)
    @foreach($berita11 as $data)
    <div class="post-carousel">
      <a href="{{route('show.show',$data->judul_slug)}}"><img src="{{asset('/img/'.$data->cover)}}" alt=""></a>
      <span class="badge badge-ps4">{{$data->categori->categori}}</span>
      <div class="post-block">
        <div class="post-caption">
          <h2 class="post-title">
            <a href="{{route('show.show',$data->judul_slug)}}">{{$data->judul}}</a>
          </h2>
          <div class="post-meta">
            <span><i class="fa fa-clock-o"></i> {{ date('d F, Y', strtotime($data->created_at)) }} by <a href="profile.html">{{($data->authors)}}</a></span>
            <span><a href="blog-post.html#comments"><i class="fa fa-eye"></i> {{($data->views)}} Views</a></span>
          </div>
        </div>
      </div>
    </div>
    @endforeach
    @else
    <div class="post-carousel">
      <a href="{{route('show.show',$data->judul_slug)}}"><img src="{{asset('/img/'.$data->cover)}}" alt="" ></a>
      <span class="badge badge-ps4">{{$data->categori->categori}}</span>
      <div class="post-block">
        <div class="post-caption">
          <h2 class="post-title">
            <a href="{{route('show.show',$data->judul_slug)}}">{{$data->judul}}</a>
          </h2>
          <div class="post-meta">
            <span><i class="fa fa-clock-o"></i> {{ date('d F, Y', strtotime($data->created_at)) }} by <a href="profile.html">{{($data->authors)}}</a></span>
            <span><a href="blog-post.html#comments"><i class="fa fa-eye"></i> {{($data->views)}} Views</a></span>
          </div>
        </div>
      </div>
    </div>
    @endif
    @endforeach
  </div>
</section>

{{-- Sementara --}}
{{-- <section class="bg-secondary p-t-15 p-b-5 p-x-15">
  <div class="owl-carousel owl-videos">
    @foreach($vidios as $data)
    @if($data->status<=0)
    @else
    @php
    $videoList = Youtube::getVideoInfo([$data->link_id]); 
    @endphp
    @foreach($videoList as $data1)
    <div class="card card-video">
      <div class="card-img">
        <a href="{{route('vidios',$data->judul)}}">
          <img src="{{asset('/img/youtube/'.$data->cover)}}" alt="{{asset('/img/youtube/'.$data->cover)}}" style="width: 300px;height: 100px;">
        </a>
        <div class="card-meta">
          <span></span>
        </div>
      </div>
      <div class="card-block">
        <h4 class="card-title"><a href="{{($data->link)}}">{{($data1->snippet->title)}}</a></h4>
        <div class="card-meta">
          <span><i class="fa fa-clock-o"></i>
            {!! substr($data1->snippet->publishedAt,0,10)."..." !!}
          </span>
          <span>{{$data1->statistics->viewCount}} views</span>
        </div>
      </div>
    </div>
    @endforeach
    @endif
    @endforeach
  </div>
</section> --}}
