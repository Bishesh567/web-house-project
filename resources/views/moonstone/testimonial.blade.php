<section id="testimonial" class="testimonial-section">
    <br>
    <br>
  <h3 class="text-center">Client's We Have Worked With</h3>
  <br>

    <div class="container">
    <div class="pt-5 row align-items-center">
      <div class="col-md-12">
        <div id="myCarousel" class="carousel slide" data-bs-interval="5000" data-bs-ride="carousel">
          <div class="carousel-inner">
          @foreach($testimonial as $test)
            <div class="carousel-item testi-item text-center {{ $loop->first ? 'active' : '' }}" data-color="#fb9c9a" data-img="img/testimonial/1.png">
              <!--<p>{!! $test->description !!}</p>-->
              <img src="{{asset('/uploads/testimonials/'.$test->image)}}" class="testi_img">
              <h3>{{$test->name}} - <span>{{$test->job}}</span></h3>
            </div>
            @endforeach
          </div>
          <div class="py-3">
            <center>
              <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <img src="{{asset('front_assets/images/left-arrow.png')}}" alt="prev">
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <img src="{{asset('front_assets/images/right-arrow.png')}}" alt="prev">
            <span class="visually-hidden">Next</span>
          </button>
          </center>
          </div>
                
        </div>
      </div>
    </div>
  </div>
</section>