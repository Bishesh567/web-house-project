<header class="main-header">
            <a href="{{url('/dashboard')}}" class="logo">
               <!-- Logo -->
               <span class="logo-mini">
                <h2>BtB</h2>
               </span>
               <span class="logo-lg">
               <span class="company-name" style="color: #fff;">Moonstone</span>
               </span>
            </a>
            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top">
               <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                  <!-- Sidebar toggle button-->
                  <span class="sr-only">Toggle navigation</span>
                  <span class="pe-7s-angle-left-circle"></span>
               </a>
             <div class="navbar-custom-menu">
                  <ul class="nav navbar-nav">
                     <li class="dropdown dropdown-user">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: #fff; margin-top:10px;">
                         LogOut</a>
                        <ul class="dropdown-menu" >
                           <!-- <li>
                              <a href="{{url('/admin/user-profile')}}">
                              <i class="fa fa-user"></i> User Profile</a>
                           </li> -->
                           <li><a href="{{url('/loguot')}}">
                              <i class="fa fa-sign-out"></i> Signout</a>
                           </li>
                        </ul>
                     </li>
                  </ul>
               </div>
            </nav>
         </header>