@extends('admin.layouts.master')

@section('content')

<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="header-icon">
         <i class="fa fa-image"></i>
      </div>
      <div class="header-title">
         <h1>Flims</h1>
         <small>Flim List</small>
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
                        <a class="btn btn-add" href="{{route('flims.create')}}"> <i class="fa fa-plus"></i> Add Ads
                        </a>
                     </div>
                  </div>
                  <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                  <div class="table-responsive">
                     <table id="table_id" class="table table-bordered table-striped table-hover">
                        <thead>
                           <tr class="info">
                              <th>SN</th>
                              <th>Title</th>
                              <th>Video type</th>
                              <th>Category</th>
                              <th>Link</th>
                              <th>Description</th>
                              <th>Status</th>

                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           @if($detail->count())
                           @foreach($detail as $key=> $associates)
                           <tr>
                              <td>{{++$key}}</td>
                              <td>{{$associates->title}}</td>
                              <td>{{$associates->video_type}}</td>
                              <td>{{$associates->category}}</td>
                              <td>{{$associates->link}}</td>
                              <td>{!! $associates->description !!}</td>
                              <!--<td>-->
                              <!--   @if(!empty($associates->image))-->
                              <!--   <img src="{{asset('uploads/associates/'.$associates->image)}}" alt="" style="width: 300px; height:100px;">-->
                              <!--   @endif-->
                              <!--</td>-->

                              <td>
                                 @if($associates->publish == 0)
                                    <span style="color: red;">Dactive</span>
                                  @else
                                   <span style="color: green;">Active</span>
                                  @endif
                              </td>
                              <td>
                                 <a href="{{route('flims.edit',$associates->id)}}" class="btn btn-add btn-sm" title="Edit associates"><i class="fa fa-pencil"></i></a>
                                 <form id="delete-form-{{ $associates->id }}" method="POST" action="{{route('flims.destroy',$associates->id)}}" style="display: none;">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                 </form>
                                 <a href="{{route('flims.destroy',$associates->id)}}" onclick="
                                          if(confirm('Are you Sure, You want to delete this?')){
                                             event.preventDefault();
                                             document.getElementById('delete-form-{{ $associates->id }}').submit();
                                          }else{
                                             event.preventDefault();
                                             }
                                 " class="btn btn-danger btn-sm" title="Delete associates"><i class="fa fa-trash-o"></i> </a>
                              </td>
                           </tr>
                           @endforeach
                           @else
                           <tr>
                             <td colspan="8">
                                  You do not have any data yet.
                            </td>
                           </tr>
                        @endif
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
