@extends('admin.layouts.master')
@section('title','site Setting')
@section('content')

<div class="content-wrapper">
   <section class="content-header">
      <div class="header-icon">
         <i class="fa fa-gear"></i>
      </div>
      <div class="header-title">
         <h1>Site Setting</h1>
      </div>
   </section>
   @if(Session::has('flash_message_error'))
   <div class="alert alert-sm alert-danger alert-block" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span area-hidden="true">&times;</span>
      </button>
      <strong>{!! session('flash_message_error') !!}</strong>
   </div>
   @endif

   @if(Session::has('flash_message_success'))
   <div class="alert alert-sm alert-success alert-block" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
      </button>
      <strong>{!! session('flash_message_success') !!}</strong>
   </div>
   @endif
   <!-- Main content -->
   <section class="content">
      <div class="row">
         @if ($errors->any())
         <div class="alert alert-danger" role="alert">
            <ul>
               <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="color:#000;">
                  <span aria-hidden="true">&times;</span>
               </button>
               @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
               @endforeach
            </ul>
         </div>
         @endif
         <!-- Form controls -->
         <div class="col-sm-12">
            <form class="col-sm-12" enctype="multipart/form-data" action="{{route('sitesetting.update',$detail->id)}}" method="POST">
               {{csrf_field()}}
               <input type="hidden" name="_method" value="PUT">
               <div class="panel panel-bd lobidrag">
                  <div class="panel-body">
                     <div class="form-group col-sm-6">
                        <label>Email:</label>
                        <input type="text" class="form-control" value="{{$detail->email}}" name="email" id="email">
                     </div>
                     <div class="form-group col-sm-6">
                        <label>Facebook:</label>
                        <input type="text" class="form-control" value="{{$detail->facebook}}" name="facebook" id="facebook">
                     </div>
                     <div class="form-group col-sm-6">
                        <label>Youtube:</label>
                        <input type="text" class="form-control" value="{{$detail->youtube}}" name="youtube" id="youtube">
                     </div>
                     <div class="form-group col-sm-6">
                        <label>Instagram:</label>
                        <input type="text" class="form-control" value="{{$detail->instagram}}" name="instagram" id="instagram">
                     </div>
                     <div class="form-group col-sm-6">
                        <label>Location:</label>
                        <input type="text" class="form-control" value="{{$detail->location}}" name="location" id="location">
                     </div>
                     <div class="form-group col-sm-6">
                        <label>Messanger</label>
                        <input type="text" class="form-control" value="{{$detail->messanger}}" name="messanger" id="messanger">
                     </div>
                     <div class="form-group col-sm-6">
                        <label>Phone</label>
                        <input type="text" class="form-control" value="{{$detail->phone}}" name="phone" id="phone">
                     </div>
                  </div>
               </div>
               <div class="panel panel-bd lobidrag">
                  <div class="panel-body">
                     <div class="col-sm-12">
                     <h5>Youtube Link For Home page</h5>
                        <div class="form-group col-sm-6">
                           <label>link:</label>
                           <input type="text" class="form-control" value="{{$detail->youtube_link}}" name="youtube_link" id="youtube_link">
                        </div>

                     </div>
                  </div>
               </div>
               <div class="panel panel-bd lobidrag">
                  <div class="panel-body">
                     <div class="col-sm-12">
                        <div class="form-group col-sm-6">
                           <label>Logo</label>
                           <input type="file" name="logo">
                           @if(!empty($detail->logo))
                           <input type="hiddent" name="current_image" value="{{$detail->logo}}">
                           <img style="width:100px; margin-top: 10px;" src="{{asset('images/main/'.$detail->logo)}}">
                           @endif
                        </div>
                        <div class="form-group col-sm-4">
                           <label>Fav Icon</label>
                           <input type="file" name="fav_icon">
                           @if(!empty($detail->fav_icon))
                           <input type="hiddent" name="banner_image" value="{{$detail->fav_icon}}">
                           <img style="width:100px; margin-top: 10px;" src="{{asset('images/main/'. $detail->fav_icon)}}">
                           @endif
                        </div>

                     </div>

                     <div class="reset-button col-sm-12">
                        <input type="submit" class="btn btn-success" value="Update Site Setting">
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </div>
</div>
</section>
<!-- /.content -->
</div>

@endsection
@push('custom-scripts')
<!-- CK Editor -->
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
@include('admin.msg._partials.ckeditorsetting')
<script>
   $(document).ready(function() {
      $('.alert-success').fadeIn().delay(3000).fadeOut();
   });
</script>
@endpush