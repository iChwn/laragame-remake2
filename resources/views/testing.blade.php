{{-- @foreach($videoList as $data)
{{$data->snippet->title}}<p>
@endforeach --}}
@php
use Alaouy\Youtube\Facades\Youtube;
@endphp

@foreach($vid as $data)
<p>
@php
$videoList = Youtube::getVideoInfo([$data->link_id]); 
@endphp
@foreach($videoList as $data2)
{{$data2->snippet->title}}
<br>
Like Count :{{$data2->statistics->likeCount}}
<br>
View Count :{{$data2->statistics->viewCount}}
@endforeach
@endforeach