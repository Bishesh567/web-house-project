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
                                    <i class="fa fa-user-secret"> </i>
                                    <div class="inbox-avatar-text hidden-xs hidden-sm">
                                       <div class="avatar-name">Moonstone</div>
                                       <div><small>Mailbox</small></div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-xs-8">
                                 <div class="inbox-toolbar btn-toolbar">
                                    <div class="hidden-xs hidden-sm btn-group">
                                       <a href="{{route('delete-message',$messageDetail->id)}}" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm" title="Delete Message"><i class="fa fa-trash-o"></i> </a>
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
                                       <h6>Mailbox</h6>
                                       <ul class="nav">
                                          <li class="active"><a href="{{route('contact.index')}}"><i class="fa fa-inbox"></i>Inbox <small class="label pull-right bg-green">{{$messageCount}}</small></a></li>
                                       </ul>
                                       <hr>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-9 p-0 inbox-mail">
                                 <div class="inbox-avatar p-20 border-btm">
                                    <!-- <img src="assets/dist/img/avatar5.png" class="border-green hidden-xs hidden-sm" alt=""> -->
                                    <div class="inbox-avatar-text">
                                       <div class="avatar-name"><strong>From: </strong>
                                          {{$messageDetail->name}}
                                       </div>
                                    </div>
                                    <div class="inbox-date text-right hidden-xs hidden-sm">
                                       <div style="color: #43525A;"><small>{{$messageDetail->created_at->format('M D,Y')}}, {{$messageDetail->created_at->diffForHumans()}}</small></div>
                                    </div>
                                 </div>
                                 <div class="inbox-mail-details p-20" style="margin-bottom: -35px;">
                                    <p><strong>Email : {{$messageDetail->email}} </strong></p>
                                    
                                 </div>
                                 <div class="inbox-mail-details p-20">
                                    <p><strong>Message : </strong></p>
                                    {{$messageDetail->message}}
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