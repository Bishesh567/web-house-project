@extends('moonstone.layouts.master')

@section('content')

<!-- HOME SECTION -->
<section id="home" class="h-100 w-100">
  <div class="image-color" style="background-image: url('{{asset('/uploads/banners/'.$bannerDetail->image)}}');">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
          <div  class="banner-part">
            <h3 class="genre">genere</h3>
            <h2 class="movie-types">{{@$bannerDetail->genre}}<span class="text-light rating">{{@$bannerDetail->rating}}</span></h2>
            <h1 class="deep-qoute">{{@$bannerDetail->heading}}</h1>
            <p class="baner-description">{!! @$bannerDetail->description !!} </p>
          </div>

         <div>
            <div class="button-play">
              <a class="m-2 btn btn-outline-light btn-lg btn-getstart" href="#contactus">Send Us Your Story</a>

              <!-- <a class="m-2 venobox btn btn-outline-light btn-lg text-uppercase" data-autoplay="true" data-vbtype="video" href="{{@$bannerDetail->link}}" data-gall="myGallery">-->
              <!--  play trailer-->
              <!--</a>-->
            </div>
            <h6 class="button-play-info">Make Your Story Come To Life</h6>
          </div>
        </div>
    </div>
  </div>
  </div>
</section>
<!-- ABOUTUS SECTION -->

<!--@include('moonstone.aboutus')-->


<!-- THIS IS OUR FILM/PRODUCT SECTION -->

@include('moonstone.film')

<!-- COUNTER SECTION -->
<section style="background-color: #eeeeeea1;">
   <div class="container py-5">
       <div class="row">

        <div class="col-sm-12 col-md-4 col-lg-4">
            <center>
                <div class="counter-wrapper">
                    <div id="counter" class="counter-box">
                    <i class="fa fa-video-camera fa-4x"></i>
                    <div class="counter-wrapper-inner"><span class="count" data-count="2333"></span><i class="fa fa-plus" aria-hidden="true"></i></div>
                    <p>Complete Project</p>
                    </div>
                </div>
            </center>
        </div>


          <div class="col-sm-12 col-md-4 col-lg-4">
            <center>
                <div class="counter-wrapper">
                    <div id="counter" class="counter-box">
                    <i class="fa fa-smile-o fa-4x"></i>
                    <div class="counter-wrapper-inner"><span class="count" data-count="55555"></span><i class="fa fa-plus" aria-hidden="true"></i></div>
                    <p>Happy Clients </p>
                    </div>
                </div>
            </center>
          </div>

        <div class="col-sm-12 col-md-4 col-lg-4">
            <center>
                <div class="counter-wrapper">
                    <div id="counter" class="counter-box">
                    <i class="fa fa-camera-retro fa-4x"></i>
                    <div class="counter-wrapper-inner"><span class="count" data-count="8888"></span><i class="fa fa-plus" aria-hidden="true"></i></div>
                    <p>Current Projects</p>
                    </div>
                </div>
            </center>
        </div>
  </div>
  </div>
</section>
<!-- LARGE VIDEO BOX SECTION -->
<section class="my-5">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="embed-responsive embed-responsive-21by9">
        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$details->youtubeVideo($details['youtube_link'])}}"
           allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- TESTIMONIAL SECTION -->

@include('moonstone.testimonial')
<!-- SERVICE SECTION -->

@include('moonstone.service')

<!-- CONTACT US SECTION -->

@include('moonstone.contact_us')

<!-- FOOTER SECTION START -->
  <footer class="bg-light text-lg-start">

    <hr class="m-0" />

    <!-- Copyright -->
    <div class="p-3 text-center" style="background-color: rgba(0, 0, 0, 0.9);">
        <div class="container footer-text1">
      <div class="row">
        <div class="col">
          <h1 class="text-uppercase text-light">moonstone <br>film production & movie studio</h1>
          <ul class="footer-text">
               <li>
                <a class="text-decoration-none text-uppercase text-light" aria-current="page" href="#ourfilm">Our Films</a>
              </li>
              <li>
                <a class="text-decoration-none text-uppercase text-light" aria-current="page" href="#service">Our Team</a>
              </li>
              <li>
                <a class="text-decoration-none text-uppercase text-light" aria-current="page" href="/filmwithus">Flim With Us</a>
              </li>
          </ul>
          <a href="{{$details->facebook}}"> <i class="bi bi-facebook"></i></a>
          <a href="{{$details->youtube}}"><i class="bi bi-youtube"></i></a>
        </div>
      </div>
  </div>
    </div>
     <p class="py-3 text-center bg-dark text-light"><span style="color:#fff">© 2021 Moonstone Production </span><span style="color:#fff"> | </span><span style="color:#fff">Website By:</span> <a href="https://webhousenepal.com/" target="_blank" style="color:#FAAF40">Web House Nepal</a></p>
    <!-- Copyright -->
  </footer>
  <!-- FOOTER SECTION END-->


@endsection
@push('custom-scripts')
    <script type="text/javascript">
  var counted = 0;
  $(window).scroll(function() {

    var oTop = $('#counter').offset().top - window.innerHeight;
    if (counted == 0 && $(window).scrollTop() > oTop) {
      $('.count').each(function() {
        var $this = $(this),
          countTo = $this.attr('data-count');
        $({
          countNum: $this.text()
        }).animate({
            countNum: countTo
          },

          {

            duration: 10000,
            easing: 'swing',
            step: function() {
              $this.text(Math.floor(this.countNum));
            },
            complete: function() {
              $this.text(this.countNum);
              //alert('finished');
            }

          });
      });
      counted = 1;
    }

  });
</script>
<script>
function myFunction() {
  var dots = document.getElementById("nextt");
  var moreText = document.getElementById("alll");
  var btnText = document.getElementById("viewalll");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "View All";
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "View less";
    moreText.style.display = "inline";
  }
}
</script>

@endpush
