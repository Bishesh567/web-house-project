<section id="aboutus" class="mt-3">
  <h1 class="text-center py-5"> ABOUT US</h1>
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-6 col-lg-6">
        <img src="{{asset('/uploads/aboutus/'.@$aboutusDetail->image)}}" class="aboutus-img">
      </div>
      <div class="col-sm-12 col-md-6 col-lg-6">
        <div class="">
          <h1 class="text-uppercase"><strong>we <br> are <span class="zero">{{@$aboutusDetail->years_of_experence}}</span>
              <sup><i class="bi bi-plus-lg"></i></sup>
              <br> year of experience</strong>
          </h1>
        </div>
        <div class="aboutus-txt">
          {!! substr(@$aboutusDetail->description, 0, 250) !!}
          <span id="dots">...</span>
        </div>
        <span id="more" style="display: none;">
          <p class="aboutus-txt">
            {!! substr(@$aboutusDetail->description, 250) !!}
          </p>
        </span>
        <button type="button" class="btn btn-outline-secondary" id="readMore">Learn More</button>
      </div>
    </div>
  </div>
</section>