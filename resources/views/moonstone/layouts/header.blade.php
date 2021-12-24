<header>
    <nav class="navbar navbar-expand-lg" id="navhead">
  <div class="container">
    <a class="navbar-brand" id="navbar-brand" href="#"><img src="{{asset('images/main/'. $details->logo)}}" 
    style="max-height: 74px;" alt="logo"></a>
    
     
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <!--<li class="nav-item">-->
        <!--  <a class="nav-link active" aria-current="page" href="#aboutus">about us</a>-->
        <!--</li>-->
        <!--<li class="nav-item">-->
        <!--  <a class="nav-link active" aria-current="page" href="#service">service</a>-->
        <!--</li>-->
        <!-- <li class="nav-item ">
          <a style="font-family: 'Brush Script MT', cursive;font-size:30px;" class="nav-link active" aria-current="page" href="#ourfilm">our film</a>
        </li> -->
        <!-- <li class="nav-item ">
          <a style="font-family: 'Brush Script MT', cursive;font-size:30px;"class="nav-link active nav-list" aria-current="page" href="/filmwithus">Film With Us</a>
        </li> -->
        <!--<li class="nav-item">-->
        <!--  <a class="nav-link active" aria-current="page" href="/filmwithus">Film With Us</a>-->
        <!--</li>-->
        <!--<li class="nav-item">-->
        <!--  <a class="nav-link active" aria-current="page" href="#contactus">contact</a>-->
        <!--</li>-->
      </ul>
    </div>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item ">
            <a style="font-size: 16px; border-right: 1px solid #fff;margin-right: 20px; padding-right: 20px;" class="nav-link active nav-list" aria-current="page" href="/filmwithus">Film With Us</a>
          </li>
            <li class="pr-5 nav-item">
                <a class="nav-link active" target="_blank" href="{{$details->youtube}}"><i class="fa fa-youtube-play"></i></a>
             </li>
            <li class="nav-item">
                <a class="nav-link active" target="_blank" href="{{$details->facebook}}"> <i class="fa fa-facebook-official"></i></a>
            </li>
          
             <li class="nav-item">
                <a class="nav-link active" target="_blank" href="{{$details->instagram}}"><i class="fa fa-instagram"></i></a>
            </li>
             
        </ul>
    </div>
  </div>
</nav>
</header>