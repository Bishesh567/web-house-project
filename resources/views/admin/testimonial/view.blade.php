@extends('admin.layouts.master')
@section('content')

<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="header-icon">
         <i class="fa fa-image"></i>
      </div>
      <div class="header-title">
         <h1>Testimonial</h1>
         <small>Testimonial List</small>
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
         <div class="col-sm-12">
            <div class="panel panel-bd lobidrag">
               <div class="panel-body">
                  <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                  <div class="btn-group">
                     <div class="buttonexport" id="buttonlist">
                        <a class="btn btn-add" href="{{route('testimonial.create')}}"> <i class="fa fa-plus"></i> Add Testimonial
                        </a>
                     </div>
                  </div>
                  <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                  <div class="table-responsive">
                     <table id="table_id" class="table table-bordered table-striped table-hover">
                        <thead>
                           <tr class="info">
                              <th>Id</th>
                              <th>Name</th>
                              <th>Job Title</th>
                              <th>Image</th>
                              <th>Status</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach($details as $detail)
                           <tr>
                              <td>{{$detail->id}}</td>
                              <td>{{$detail->name}}</td>
                              <td>{{$detail->job}}</td>
                              <td>
                                 @if(!empty($detail->image))
                                 <img src="{{asset('/uploads/testimonials/'.$detail->image)}}" alt="" style="width: 50px; height:80px;">
                                 @endif
                              </td>
                              <td>
                                 @if($detail->publish == 0)
                                 <span style="color: red;">Dactive</span>
                                 @else
                                 <span style="color: green;">Active</span>
                                 @endif
                              </td>
                              <td>
                                 <a href="{{route('testimonial.edit',$detail->id)}}" class="btn btn-add btn-sm" title="Edit testimonial"><i class="fa fa-pencil"></i></a>
                                 <form id="delete-form-{{ $detail->id }}" method="POST" action="{{route('testimonial.destroy',$detail->id)}}" style="display: none;">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                 </form>
                                 <a href="{{route('testimonial.destroy',$detail->id)}}" onclick="
                                          if(confirm('Are you Sure, You want to delete this?')){
                                             event.preventDefault();
                                             document.getElementById('delete-form-{{ $detail->id }}').submit();
                                          }else{
                                             event.preventDefault();
                                             }
                                          " class="btn btn-danger btn-sm" title="Delete Testimonial"><i class="fa fa-trash-o"></i> </a>
                              </td>
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
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