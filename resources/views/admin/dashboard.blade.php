@extends('admin.layouts.master')
@section('content')
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-dashboard"></i>
               </div>
               <div class="header-title">
                  <h1>Moonstone</h1>
                  <small>Very detailed & featured admin.</small>
               </div>
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                    <a href="#"><div id="cardbox1">
                        <div class="statistic-box">
                           <i class="fa fa-user-plus fa-3x"></i>
                           <div class="counter-number pull-right">
                              <span class="count-number">{{$detail}}</span> 
                              <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                              </span>
                           </div>
                           <h3>Flims</h3>
                        </div>
                     </div>
                    </a>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                  <a href="#" style="color: #fff;"><div id="cardbox2">
                        <div class="statistic-box">
                           <i class="fa fa-list-alt fa-3x"></i>
                           <div class="counter-number pull-right">
                              <span class="count-number">{{$serviceDetails}}</span> 
                              <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                              </span>
                           </div>
                           <h3>Services</h3>
                        </div>
                        </a>
                     </div>
                  </div>
                  </div>
               </div>
            </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
@endsection
