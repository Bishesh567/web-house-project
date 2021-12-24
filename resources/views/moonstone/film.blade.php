<section id="ourfilm" class="our-film">

  <h3 class="pt-5 text-center">Our Recent Projects</h3>
  <h1 class="text-center">We Create a Petrified Fountain of Thought</h1><br>

  <div class="container">
  <h1 style="text-align:center"><span>Videos</span></h1>
    <div class="row">
    @foreach($firstflimDetail->take(3) as $flim)
      <div class="mx-auto mt-3 col-sm-12 col-md-3 col-lg-3">
          <div class="img-box">
        <a class="venobox" data-autoplay="true" data-vbtype="video" href="{{$flim->link}}" data-gall="myGallery">
          <iframe class="shadow-sm embed-responsive-item video_image" src="https://www.youtube.com/embed/{{$details->youtubeVideo($flim['link'])}}"
           allowfullscreen></iframe>
           </a>
        </div>
         <h3 >{{$flim->title}}</h3>
         <p>{!! $flim->description !!}</p>
        </div>
       @endforeach
      </div>
    <span id="next"></span>
    <span id="all" style="display:none;">
     <div class="mt-1 row">
      @foreach($firstflimDetail->skip(3) as $detail)
         <div class="mt-3 col-sm-12 col-md-3 col-lg-3">
          <div class="img-box">
        <a class="venobox" data-autoplay="true" data-vbtype="video" href="{{$detail->link}}" data-gall="myGallery">
          <iframe class="shadow-sm embed-responsive-item video_image" src="https://www.youtube.com/embed/{{$details->youtubeVideo($detail['link'])}}"
           allowfullscreen></iframe>
           </a>
        </div>
         <h3 style="text-align:center;">{{ $detail->title}}</h3>
         <p style="text-align:center;">{!! $detail->description !!}</p>
        </div>
        @endforeach
    </div>
    </span>
    <div class="py-5 text-center">
      <button type="button" class="border-0 btn btn-secondary btn-lg" id="viewAll">View All</button>
    </div>
  </div>


  <div class="container">
  <h1 style="text-align:center"><span>Advertisement</span></h1>
    <div class="row">
    @foreach($firstadsDetail->take(3) as $flim)
      <div class="mx-auto mt-3 col-sm-12 col-md-3 col-lg-3">
          <div class="img-box">
        <a class="venobox" data-autoplay="true" data-vbtype="video" href="{{$flim->link}}" data-gall="myGallery">
          <iframe class="shadow-sm embed-responsive-item video_image" src="https://www.youtube.com/embed/{{$details->youtubeVideo($flim['link'])}}"
           allowfullscreen></iframe>
           </a>
        </div>
         <h3 >{{$flim->title}}</h3>
         <p>{!! $flim->description !!}</p>
        </div>
       @endforeach
      </div>
    <span id="nextt"></span>
    <span id="alll" style="display:none;">
     <div class="mt-1 row">
      @foreach($firstadsDetail->skip(3) as $detail)
         <div class="mt-3 col-sm-12 col-md-3 col-lg-3">
          <div class="img-box">
        <a class="venobox" data-autoplay="true" data-vbtype="video" href="{{$detail->link}}" data-gall="myGallery">
          <iframe class="shadow-sm embed-responsive-item video_image" src="https://www.youtube.com/embed/{{$details->youtubeVideo($detail['link'])}}"
           allowfullscreen></iframe>
           </a>
        </div>
         <h3 style="text-align:center;">{{ $detail->title}}</h3>
         <p style="text-align:center;">{!! $detail->description !!}</p>
        </div>
        @endforeach
    </div>
    </span>
    <div class="py-5 text-center">
      <button type="button" onclick="myFunction()" class="border-0 btn btn-secondary btn-lg" id="viewalll">View All</button>
    </div>
  </div>


</section>

