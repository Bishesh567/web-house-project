@extends('admin.layouts.master')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="fa fa-image"></i>
        </div>
        <div class="header-title">
            <h1>Registered Orders</h1>
            <small>Registered Orders List</small>
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
                        <div class="table-responsive">
                            <table id="table_id" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr class="info">
                                        <th>SN</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone No:</th>
                                        <th>Interested for</th>
                                        <th>Product Details</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($details->count())
                                    @foreach($details as $key=> $user)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            {{$user->phone}}
                                        </td>
                                        <td>{{$user->interested_for}}</td>
                                        <td>{{$user->product}}</td>
                                        <td>
                                            <form id="delete-form-{{ $user->id }}" method="POST" action="{{route('register.destroy',$user->id)}}" style="display: none;">
                                                {{csrf_field()}}
                                                {{method_field('DELETE')}}
                                            </form>
                                            <a href="{{route('register.destroy',$user->id)}}" onclick="
                                          if(confirm('Are you Sure, You want to delete this?')){
                                             event.preventDefault();
                                             document.getElementById('delete-form-{{ $user->id }}').submit();
                                          }else{
                                             event.preventDefault();
                                             }
                                          " class="btn btn-danger btn-sm" title="Delete user"><i class="fa fa-trash-o"></i> </a>
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