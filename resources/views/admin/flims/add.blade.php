@extends('admin.layouts.master')
@section('content')

<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="header-icon">
         <i class="fa fa-home"></i>
      </div>
      <div class="header-title">
         <h1>Add Flim</h1>
         <small>Flim Lists</small>
      </div>
   </section>
   @include('admin.msg._partials.messages.info')
   <!-- Main content -->
   <section class="content">
      <div class="row">
         <!-- Form controls -->
         <div class="col-sm-12">
            <div class="panel panel-bd lobidrag">
               <div class="panel-heading">
                  <div class="btn-group" id="buttonlist">
                     <a class="btn btn-add " href="{{route('flims.index')}}">
                        <i class="fa fa-eye"></i> View Flim list</a>
                  </div>
               </div>
               <div class="panel-body">
                  <form class="col-sm-12" enctype="multipart/form-data" action="{{route('flims.store')}}" method="POST">
                     {{csrf_field()}}
                      <div class="form-group col-sm-6">
                        <label>Title</label>
                        <input type="text" class="form-control" placeholder="Enter title" name="title" id="title" value="{{old('title')}}" required>
                     </div>
                      <div class="form-group col-sm-6">
                        <label>Category</label>
                        <input type="text" class="form-control" placeholder="Enter Category" name="category" id="category" value="{{old('category')}}" required>
                     </div>
                     <div class="form-group col-sm-6">
                        <label>Link</label>
                        <input type="text" class="form-control" placeholder="Enter Link" name="link" id="aname" value="{{old('link')}}" required>
                     </div>

                     <div class="form-group col-sm-6">
                        <label>Video Type</label>
                        <select class="form-control" name="video" id="aname">
                            <option name="video" value="normal">Normal video</option>
                            <option name="video" Value="ads">Video for Advertisement</option>
                        </select>
                     </div>

                     <div class="form-group col-sm-6">
                        <label>Short Description</label>
                        <textarea type="text" style="height: 200px;" class="form-control" placeholder="Enter Short Description" name="description" id="description" value="{{old('description')}}"></textarea>
                     </div>
                     <!--<div class="form-group col-sm-6">-->
                     <!--   <label>Image(Dimension 480*480)</label>-->
                     <!--   <input type="file" name="logo">-->
                     <!--</div>-->
                     <div class="col-md-12 check-list">
                        <label class="ui-checkbox ui-checkbox-primary">
                           <input name="publish" type="checkbox" checked>
                           <span class="input-span"></span>Publish</label>
                     </div>
                     <div class="reset-button col-sm-12">
                        <input type="submit" class="btn btn-success" value="Add Ads">
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
