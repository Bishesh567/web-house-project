@extends('admin.layouts.master')
@section('content')

<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="header-icon">
         <i class="fa fa-image"></i>
      </div>
      <div class="header-title">
         <h1>Edit Testimonial</h1>
         <small>Testimonial list</small>
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
               <div class="panel-heading">
                  <div class="btn-group" id="buttonlist">
                     <a class="btn btn-add " href="{{route('testimonial.index')}}">
                        <i class="fa fa-eye"></i> View Testimonials</a>
                  </div>
               </div>
               <div class="panel-body">
                  <form class="col-sm-12" enctype="multipart/form-data" action="{{route('testimonial.update',$detail->id)}}" method="POST">
                     {{csrf_field()}}
                     <input type="hidden" name="_method" value="PUT">
                     <div class="form-group col-sm-12">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{$detail->name}}">
                     </div>
                     <div class="form-group col-sm-12">
                        <label>Job Titile</label>
                        <input type="text" class="form-control" name="job" id="job" value="{{$detail->job}}">
                     </div>
                     <div class="form-group col-sm-8">
                        <label>Description</label>
                        <textarea type="text" style="height: 200px;" class="form-control"
                         name="description" id="description" value="{{old('description')}}">{!! $detail->description !!}</textarea>
                     </div>
                     <div class="form-group col-sm-4">
                        <label>Image</label>
                        <input type="file" name="image">
                        @if(!empty($detail->image))
                        <input type="hiddent" name="current_image" value="{{$detail->image}}">
                        <img style="width:100px; margin-top: 10px;" src="{{asset('/uploads/testimonials/'.$detail->image)}}">
                        @endif
                     </div>
                     <div class="col-sm-4 check-list">
                        <label class="ui-checkbox ui-checkbox-primary">
                           <input name="publish" type="checkbox" {{ $detail->publish == 1 ? 'checked' : null }}>
                           <span class="input-span"></span>Publish</label>
                     </div>
                     <div class="reset-button col-sm-4">
                        <input type="submit" class="btn btn-success" value="edit service">
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
@push('custom-scripts')
<script>
    $(document).ready(function() {
        $('.alert-success').fadeIn().delay(3000).fadeOut();
    });
</script>
@endpush