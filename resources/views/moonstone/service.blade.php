<style>
  .flex-icon-top-inner {
    text-align: center;
    height: 50%;
}
  .flex-icon-img{
    object-fit: cover;
    height: 260px !important;
    max-width: 200px !important;
    width: 100%;
  }
</style>
<section id="service" class="my-5">
  <h1 class="pt-5 text-center">Meet Our Team</h1>
  <h5 class="text-center">Individual commitment to a group effort--that is how our team works</h5>
  <div class="container">
    <div class="mt-3 row">
      @foreach($services as $service)
      <div class="mt-3 col-sm-12 col-md-6 col-lg-3 card-box">
        <div class="border-0 card ">
                  <div>
                    <div class="flex-icon-top-inner service_icon">
                    <img class="flex-icon-img" src="{{asset('/uploads/events/'.$service->image)}}" alt="service">
                    </div>
               </div>
                  <div class="card-body">
                    <h5 class="text-center card-title text-uppercase">{{$service->name}}</h5>
                    <p class="text-center card-text text-muted">
                     {!! $service->description !!}
                    </p>
                  </div>
              </div>
      </div>
      @endforeach
    </div>
    <br><br>
  </div>

</section>