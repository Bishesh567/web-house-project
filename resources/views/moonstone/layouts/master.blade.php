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


<body onload="load()">
  

    @include('moonstone.layouts.header')
    @yield('content')
   
   
    <!--  js links -->
    <script src="{{asset('front_assets/css/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('front_assets/css/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('front_assets/css/js/venobox.min.js')}}"></script>
    <script src="{{asset('front_assets/css/js/main.js')}}"></script>
    <script>
        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }
        // Get the element with id="defaultOpen" and click on it
            document.getElementById("defaultOpen").click();
    </script>
    
     @stack('custom-scripts')
     
</body>
</html>