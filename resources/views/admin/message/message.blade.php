@extends('admin.layouts.master')
@section('content')
 
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
            @include('admin.msg._partials.messages.info')
               <div class="row">
                  <div class="col-sm-12">
                     <div class="mailbox">
                        <div class="mailbox-header">
                           <div class="row">
                              <div class="col-xs-4">
                                 <div class="inbox-avatar">
                                    <i class="fa fa-user-circle fa-lg"></i>
                                    <div class="inbox-avatar-text hidden-xs hidden-sm">
                                       <div class="avatar-name">Moonstone</div>
                                       <div><small>Messages</small></div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-xs-8">
                                 <div class="inbox-toolbar btn-toolbar">
                                    <div class="hidden-xs hidden-sm btn-group">
                                       <!-- <button type="button" class="text-center btn btn-danger"><span class="fa fa-exclamation"></span></button>
                                       <button type="button" class="btn btn-danger"><span class="fa fa-trash"></span></button> -->
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="mailbox-body">
                           <div class="row m-0">
                              <div class="col-sm-3 p-0 inbox-nav hidden-xs hidden-sm">
                                 <div class="mailbox-sideber">
                                    <div class="profile-usermenu">
                                       <h6>Messages box</h6>
                                       <ul class="nav">
                                          <li class="active"><a href="{{route('contact.index')}}"><i class="fa fa-inbox"></i>Inbox <small class="label pull-right bg-green">{{$messageCount}}</small></a></li>
                                       </ul>
                                       <hr>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-9 p-0 inbox-mail">
                                 <div class="mailbox-content">
                                     @foreach($details as $key=> $msg)
                                    <a href="{{url('/admin/message-details/'.$msg->id)}}" class="inbox_item unread">
                                       <div class="inbox-avatar">
                                          <!-- <img src="assets/dist/img/avatar.png" class="border-green hidden-xs hidden-sm" alt=""> -->
                                          <div class="inbox-avatar-text">
                                             <div class="avatar-name">{{$msg->name}}</div>
                                             <div><small><span class="bg-green badge avatar-text">Click here</span><span><strong>To read Message: </strong></span></small></div>
                                          </div>
                                          <div class="inbox-date hidden-sm hidden-xs hidden-md">
                                             <div class="date" style="color: #43525A;">{{$msg->created_at->format('M D,Y')}}</div>
                                             <div><small>#{{++$key}}</small></div>
                                          </div>
                                       </div>
                                    </a>
                                    @endforeach
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
 @endsection
 @push('custom-scripts')
 @endpush