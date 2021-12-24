<?php
$domain=Request::root();
?>
Name:: {{$name}} <br>
Email:: {{$email}} <br>
Contact Number:: {{$phone}} <br>
Description:: {{$subject}} <br>
@foreach(json_decode($links) as $link)
<a href="{{$domain}}/public/uploads/film/{{$link}}" target="_blank">{{$link}} <br></a>


@endforeach