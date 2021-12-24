<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0'>

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="icon" href="images/main/{{$details->fav_icon}}" type="image/jpg" sizes="16x16">

    <title>MoonStone</title>
    <link rel="stylesheet" href="{{asset('front_assets/css/bootstrap.min.css')}}">
     <!--Font Awesome -->
     <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
     <!--BOOTSTRAP ICONS LINK -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('front_assets/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('front_assets/css/video-popup.min.css')}}">
    <link rel="stylesheet" href="{{asset('front_assets/css/venobox.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">

</head>


<body>
    <header>
    <nav class="navbar navbar-expand-lg" id="navhead">
  <div class="container">
    <a class="navbar-brand" id="navbar-brand" href="/"><img src="{{asset('images/main/'. $details->logo)}}"
    style="max-height: 74px;" alt=""></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Back To Home</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</header>

    <!-- HOME SECTION -->
<section style="background-image: url('{{asset('/uploads/banners/'.$bannerDetail->image)}}');" class="banerimgheight">
  <div class="image-color">
  <div class="container">

    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
          <div class="header_paragraph">
            <h4 class="header_paragraph-title">Film With us</h4>
            <p class="banertxt">
                We produce video content for television, social media, corporate promotions, commercial or other media-related fields. We help develop content, produce content, even help with post-production, or hiring directors and crew.
            </p>

          </div>

            <div class="button-form">
                <!--<button class="m-1 btn btn-outline-light btn-lg tablinks text-uppercase btn-getstart" onclick="openCity(event, 'Film')" id="defaultOpen">Film with Us</button>-->

                <!--<button class="m-1 btn btn-outline-light btn-lg tablinks text-uppercase" onclick="openCity(event, 'Work')">Work with Us</button>-->
                <P class="banertxt">Your information will remain confidential with us. Moonstone Production will not be allowed to share this information with a second party.</P>
            </div>
        </div>

        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">

                    <div id="Film" class="tabcontent">
                        <form action="{{ route('filmWithUs') }}" method="post" class="row"
                                            enctype="multipart/form-data">
                                            @csrf
                        <!-- Film with us start -->
                        <section class="filmwithus-form">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-12 col-md-10 col-sm-12 col-xs-12 bgsh header_paragraph1">
                                        <div class="mb-1">
                                            <h4 class="py-2 text-center form-title">Film With Us</h4>
                                            <hr style="margin: 0%;">
                                            <br>
                                            <input type="text" class="form-control" name="film_name" id="exampleFormControlInput1"
                                                placeholder="Enter name*">
                                                @if ($errors->has('film_name'))
                                                        <span
                                                        class="text-danger">{{ $errors->first('film_name') }}</span>
                                                    @endif
                                        </div>
                                        <div class="mb-1">
                                            <input type="email" class="form-control" name="film_email" id="exampleFormControlInput1"
                                                placeholder="Enter email*">
                                                @if ($errors->has('film_email'))
                                                        <span
                                                        class="text-danger">{{ $errors->first('film_email') }}</span>
                                                    @endif
                                        </div>

                                        <div class="mb-1">
                                            <select name='film_test' class='form-control' id=''>
                                                <option name='' value=''>Select type</option>
                                                <option value='clasical' name='film_test'>Clasical music</option>
                                                <option value='nature' name='film_test'>natual music</option>
                                                <option value='cinematic' name='film_test'>cinematic music</option>
                                                <option value='vido-game' name='film_test'>video game music</option>
                                                <option value='action' name='film_test'>action video</option>
                                                <option value='advanture' name='film_test'>Advanture film</option>
                                                <option value='comedy' name='film_test'>comedy movie</option>
                                                <option value='crime' name='film_test'>crime movie</option>
                                                <option value='drama' name='film_test'>drama video</option>
                                            </select>
                                                @if ($errors->has('film_test'))
                                                        <span class="text-danger">{{ $errors->first('film_test') }}</span>
                                                @endif
                                        </div><br>
                                        <div class="mb-1">
                                            <input type="text" class="form-control" name="film_contact_num" id="exampleFormControlInput1"
                                                placeholder="Enter contact number*">
                                                @if ($errors->has('film_contact_num'))
                                                        <span
                                                        class="text-danger">{{ $errors->first('film_contact_num') }}</span>
                                                    @endif
                                        </div>
                                        <div class="mb-1">

                                            <textarea class="form-control" name="film_desc" id="exampleFormControlTextarea1" rows="3"
                                                placeholder="Write something about yourself*"></textarea>
                                                @if ($errors->has('film_desc'))
                                                        <span
                                                        class="text-danger">{{ $errors->first('film_desc') }}</span>
                                                    @endif
                                        </div>
                                        <div class="mb-1">
                                            <input class="form-control" type="file" name="film_docs[]" id="formFileMultiple" multiple>
                                            @if ($errors->has('film_docs.*'))
                                                        <span
                                                        class="text-danger">{{ $errors->first('film_docs.*') }}</span>
                                                    @endif
                                        </div>
                                        <div class="gap-2 my-3 d-grid col-3 bttnhover">
                                            <button class="btn btn-dark" type="submit">Send File</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- Film with us end -->
                        </form>
                    </div>

                    <!--<div id="Work" class="tabcontent">-->
                    <!--    <form action="{{ route('workWithUs') }}" method="post" class="row"-->
                    <!--                        enctype="multipart/form-data">-->
                    <!--                        @csrf-->
                        <!-- Work with us start -->
                    <!--    <section>-->
                    <!--        <div class="container">-->
                    <!--            <div class="row justify-content-center">-->
                    <!--                <div class="col-lg-12 col-md-10 col-sm-12 col-xs-12 bgsh header_paragraph1">-->
                    <!--                    <div class="mb-1">-->
                    <!--                        <h4 class="py-2 text-center text-uppercase">Work With Us</h4>-->
                    <!--                        <hr style="margin: 0%;">-->
                    <!--                        <br>-->
                    <!--                        <input type="text" class="form-control" name="work_name" id="exampleFormControlInput1"-->
                    <!--                            placeholder="Enter name*">-->
                    <!--                            @if ($errors->has('work_name'))-->
                    <!--                                    <span-->
                    <!--                                    class="text-danger">{{ $errors->first('work_name') }}</span>-->
                    <!--                                @endif-->
                    <!--                    </div>-->
                    <!--                    <div class="mb-1">-->
                    <!--                        <input type="email" class="form-control" name="work_email" id="exampleFormControlInput1"-->
                    <!--                            placeholder="Enter email*">-->
                    <!--                            @if ($errors->has('work_email'))-->
                    <!--                                    <span-->
                    <!--                                    class="text-danger">{{ $errors->first('work_email') }}</span>-->
                    <!--                                @endif-->
                    <!--                    </div>-->
                    <!--                    <div class="mb-1">-->
                    <!--                        <input type="text" class="form-control" name="work_contact_num" id="exampleFormControlInput1"-->
                    <!--                            placeholder="Enter contact number*">-->
                    <!--                            @if ($errors->has('work_contact_num'))-->
                    <!--                                    <span-->
                    <!--                                    class="text-danger">{{ $errors->first('work_contact_num') }}</span>-->
                    <!--                                @endif-->
                    <!--                    </div>-->
                    <!--                    <div class="mb-1">-->
                    <!--                        <textarea class="form-control" name="work_desc" id="exampleFormControlTextarea1" rows="3"-->
                    <!--                            placeholder="Please tell us something about you*"></textarea>-->
                    <!--                            @if ($errors->has('work_desc'))-->
                    <!--                                    <span-->
                    <!--                                    class="text-danger">{{ $errors->first('work_desc') }}</span>-->
                    <!--                                @endif-->
                    <!--                    </div>-->
                    <!--                    <div class="mb-1">-->
                    <!--                        <input class="form-control" type="file" name="work_docs[]" id="formFileMultiple" multiple>-->
                    <!--                        @if ($errors->has('work_docs.*'))-->
                    <!--                                    <span-->
                    <!--                                    class="text-danger">{{ $errors->first('work_docs.*') }}</span>-->
                    <!--                                @endif-->
                    <!--                    </div>-->

                    <!--                    <div class="gap-2 my-3 d-grid col-3 bttnhover">-->
                    <!--                        <button class="btn btn-dark" type="submit">Send File</button>-->
                    <!--                    </div>-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--        </div>-->

                    <!--    </section>-->
                        <!-- Work with us end -->
                    <!--    </form>-->
                    <!--</div>-->
                </div>
    </div>

    <!-- Modal -->
    <div id="myModal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div style="position: absolute;
    margin-top:250px;" class="modal-content">

        <div  style="background-color:#ffffff;"  style="background-color:#ffffff;" class="modal-body">
            <!-- <button style="color:#fff" type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
            <!-- <span aria-hidden="true">&times;</span>
                    </button> -->
            <p style="color: #000000;" id="subsribed_success_messagess">Modal body text goes here.</p>
        </div>
        </div>
    </div>
    </div>
  </div>

  </div>
</section>

<footer class="bg-light text-lg-start">

    <hr class="m-0">

    <!-- Copyright -->
    <div class="p-3 text-center" style="background-color: rgba(0, 0, 0, 0.9);">
        <div class="container footer-text1">
      <div class="row">
        <div class="col">
          <h1 class="text-uppercase text-light">moonstone <br>film production &amp; movie studio</h1>
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
          <a href="https://www.facebook.com/MoonStone-Production-106351718450966"> <i class="bi bi-facebook"></i></a>
          <a href="https://www.youtube.com/channel/UCmVuT-I2cApiVWJh8DsHf4w"><i class="bi bi-youtube"></i></a>
        </div>
      </div>
  </div>
    </div>
     <p class="py-3 text-center bg-dark text-light"><span style="color:#fff">© 2021 Moonstone Production </span><span style="color:#fff"> | </span><span style="color:#fff">Website By:</span> <a href="https://webhousenepal.com/" target="_blank" style="color:#FAAF40">Web House Nepal</a></p>
    <!-- Copyright -->
  </footer>


    <!--  js links -->
    <script src="{{asset('front_assets/css/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('front_assets/css/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('front_assets/css/js/venobox.min.js')}}"></script>
    <script src="{{asset('front_assets/css/js/main.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>
        function openCity(evt, formName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(formName).style.display = "block";
            evt.currentTarget.className += " active";
        }
        // Get the element with id="defaultOpen" and click on it
            document.getElementById("defaultOpen").click();
    </script>
     <script type="text/javascript">

$( document ).ready(function() {
function loadSubscribeModal(){
    var status = '<?php echo Session::get('type'); ?>';
    if(status == 'success'){
        var message = '<?php echo Session::get('message'); ?>';
        document.getElementById('subsribed_success_messagess').innerHTML = message;
        $('#myModal').modal('show');
    }
    else if(status == 'danger'){
        var message = '<?php echo Session::get('messageError'); ?>';
        document.getElementById('subsribed_success_messagess').innerHTML = message;
        $('#myModal').modal('show');
    }
    else{
        $('#myModal').modal('hide');
    }
}
window.onload = loadSubscribeModal();
});
</script>
</body>
</html>

