@extends('admin.layouts.master')
@section('content')

<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="header-icon">
         <i class="fa fa-image"></i>
      </div>
      <div class="header-title">
         <h1>Edit Banner</h1>
         <small>Banners list</small>
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
            <div class="panel panel-bd lobidrag">
               <div class="panel-body">
                  <form class="col-sm-12" enctype="multipart/form-data" action="{{route('banner.update',$details->id)}}" method="POST">
                     {{csrf_field()}}
                     <input type="hidden" name="_method" value="PUT">
                     <div class="form-group col-sm-9">
                        <label>Genre</label>
                        <input type="text" class="form-control" value="{{$details->genre}}" name="genre" id="genre">
                     </div>
                     <div class="form-group col-sm-3">
                        <label>Rating</label>
                        <input type="text" class="form-control" value="{{$details->rating}}" name="rating" id="rating">
                     </div>
                     <div class="form-group col-sm-6">
                        <label>Heading</label>
                        <input type="text" class="form-control" value="{{$details->heading}}" name="heading" id="heading">
                     </div>
                     <div class="form-group col-sm-6">
                        <label>Link</label>
                        <input type="text" class="form-control" value="{{$details->link}}" name="link" id="link" >
                     </div>
                     <div class="form-group col-sm-8">
                        <label>Description</label>
                        <textarea type="text" style= "height:200px;" class="form-control" name="description" id="description" >{!! $details->description !!}</textarea>
                     </div>
                     
                     <div class="form-group col-sm-4">
                        <label>Image</label>
                        <input type="file" name="image">
                        @if(!empty($details->image))
                        <input type="hiddent" name="current_image" value="{{$details->image}}">
                        <img style="width:100px; margin-top: 10px;" src="{{asset('/uploads/banners/'.$details->image)}}">
                        @endif
                     </div>
                     <div class="col-sm-4 check-list">
                        <label class="ui-checkbox ui-checkbox-primary">
                           <input name="publish" type="checkbox" {{ $details->publish == 1 ? 'checked' : null }}>
                           <span class="input-span"></span>Publish</label>
                     </div>
                     <div class="reset-button col-sm-4">
                        <input type="submit" class="btn btn-success" value="Update">
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- /.content -->
</div>

@endsection