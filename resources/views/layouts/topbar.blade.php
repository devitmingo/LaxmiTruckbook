
            
                <div class="content">
                    <!-- Topbar Start -->
                    <div class="navbar-custom">
                        
                        <ul class="list-unstyled topbar-menu float-end mb-0">

                        <li style="    margin: 20px;">
                           
                            <center>    
                                <?php echo date('d-m-Y h:i:s'); ?>
                            </center>
                        </li>
                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                                    aria-expanded="false">
                                    <span class="account-user-avatar">
                                        <img src="{{asset('dashboard/assets/images/users/avatar-1.jpg') }}" alt="user-image" class="rounded-circle">
                                    </span>
                                    <span>
                                         <span class="account-position">{{ Auth::user()->name }}</span>
                                          <span class="account-user-name">{{ Auth::user()->email }}</span>
                                      
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                                     <!-- item-->
                                     <a href="{{ route('changePassword') }}" class="dropdown-item notify-item">
                                        <i class="mdi mdi-logout me-1"></i>
                                        <span>Change Password</span>
                                     </a>
                                    <a href="{{ route('admin.logout') }}" class="dropdown-item notify-item">
                                        <i class="mdi mdi-logout me-1"></i>
                                        <span>Logout</span>
                                    </a>
                                </div>
                            </li>

                        </ul>

                     <button class="button-menu-mobile open-left">
                            <i class="mdi mdi-menu"></i>
                        </button>
                    </div>
                    <!-- end Topbar -->

                    <!-- Start Content-->
                    <div class="container-fluid">




                    </div> <!-- container -->

                </div> <!-- content -->

              