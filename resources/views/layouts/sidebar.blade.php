   <div class="leftside-menu">

                <!-- LOGO -->
                <a href="{{ route('admin.dashboard') }}" class="logo text-center logo-light">
                    <span class="logo-lg " style="color:white;" >
                        <h1>TruckBook</h1>
                    </span>
                    <span class="logo-sm">
                        <img src="{{asset('dashboard/assets/images/logo_sm.png')}}" alt="" height="16">
                    </span>
                </a>

                <!-- LOGO -->
                <a href="{{ route('admin.dashboard') }}" class="logo text-center logo-dark">
                    <span class="logo-lg " style="color:white;" >
                        <h1>TruckBook</h1>
                    </span>
                    <span class="logo-sm">
                        <img src="{{asset('dashboard/assets/images/logo_sm_dark.png') }}" alt="" height="16">
                    </span>
                </a>

                <div class="h-100" id="leftside-menu-container" data-simplebar>

                    <!--- Sidemenu -->
                    <ul class="side-nav">

                        <li class="side-nav-title side-nav-item">Navigation</li>

                        <li class="side-nav-item">
                            <a href="{{ route('admin.dashboard') }}" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
                                <i class="uil-home-alt"></i>

                                <span> Dashboards </span>
                            </a>

                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarEcommerce" aria-expanded="false" aria-controls="sidebarEcommerce" class="side-nav-link">
                                <i class="uil-store"></i>
                                <span> Master </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarEcommerce">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="{{ route('session.create') }}">
                                        <i class="uil-calender"></i>
                                         <span>Add session</span>
                                         </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('party.index') }}">
                                        <i class="uil-calender"></i>
                                         <span>Add Party</span>
                                         </a>
                                    </li>
                                    <li style="display:none;">
                                        <a href="{{ route('supplier.index') }}">
                                        <i class="uil-calender"></i>
                                         <span>Add Supplier</span>
                                         </a>
                                    </li>

                                    <li>
                                        <a href="{{ route('driver.index') }}">
                                        <i class="uil-calender"></i>
                                         <span>Add Drivers</span>
                                         </a>
                                    </li>

                                    <li>
                                        <a href="{{ route('vehicleType.index') }}">
                                        <i class="uil-calender"></i>
                                         <span>Add Vehicle Type</span>
                                         </a>
                                    </li>

                                    <li>
                                        <a href="{{ route('billType.index') }}">
                                        <i class="uil-calender"></i>
                                         <span>Add Bill Type</span>
                                         </a>
                                    </li>

                                    <li>
                                        <a href="{{ route('vehicle.index') }}">
                                        <i class="uil-calender"></i>
                                         <span>Add Vehicle</span>
                                         </a>
                                    </li>

                                     <li>
                                        <a href="{{ route('state.index') }}">
                                        <i class="uil-calender"></i>
                                         <span>Add State</span>
                                         </a>
                                    </li>

                                    <li>
                                        <a href="{{ route('route.index') }}">
                                        <i class="uil-calender"></i>
                                         <span>Add Route</span>
                                         </a>
                                    </li>

                                    <li>
                                        <a href="{{ route('maintenance.index') }}">
                                        <i class="uil-calender"></i>
                                         <span>Add Maintenance</span>
                                         </a>
                                    </li>

                                    <li>
                                        <a href="{{ route('vendor.index') }}">
                                        <i class="uil-calender"></i>
                                         <span>Add Vendor</span>
                                         </a>
                                    </li>

                                </ul>
                            </div>
                        </li>


                      

                         <li class="side-nav-item">
                            <a href="{{ route('trips.indexAll',1) }}" class="side-nav-link">
                                <i class="uil-calender"></i>
                                <span> Trips </span>
                            </a>
                        </li>


                        <li class="side-nav-item">
                            <a href="{{ route('trips.index') }}" class="side-nav-link">
                                <i class="uil-calender"></i>
                                <span> Trip Reports</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ Route('tyre.create') }}" class="side-nav-link">
                                <i class="uil-calender"></i>
                                <span> Tyre Entry </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ Route('urea.index') }}" class="side-nav-link">
                                <i class="uil-calender"></i>
                                <span> Urea Refilling </span>
                            </a>
                        </li>
                        <!-- <li class="side-nav-item">
                            <a href="{{ Route('supplierReport') }}" class="side-nav-link">
                                <i class="uil-calender"></i>
                                <span> Supplier Balance Reports </span>
                            </a>
                        </li> -->

                        <li class="side-nav-item">
                            <a href="{{ route('partyReport') }}" class="side-nav-link">
                                <i class="uil-calender"></i>
                                <span> Party Balance Reports </span>
                            </a>
                        </li>


                        <!-- <li class="side-nav-item">
                            <a href="{{ Route('supplierledgerReport') }}" class="side-nav-link">
                                <i class="uil-calender"></i>
                                <span> Supplier Reports </span>
                            </a>
                        </li> -->

                        <li class="side-nav-item">
                            <a href="{{ route('partyLedgerReport') }}" class="side-nav-link">
                                <i class="uil-calender"></i>
                                <span> Party  Reports </span>
                            </a>
                        </li>

                        <!-- <li class="side-nav-item">
                            <a href="{{ route('companyLedger') }}" class="side-nav-link">
                                <i class="uil-calender"></i>
                                <span>Company Ledger</span>
                            </a>
                        </li> -->



                        <li class="side-nav-item">
                            <a href="{{ route('trans.create') }}" class="side-nav-link">
                                <i class="uil-calender"></i>
                                <span> Transactions </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('maintenanceForm.create') }}" class="side-nav-link">
                                <i class="uil-calender"></i>
                                <span> Maintenance </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('maintenanceForm.index') }}" class="side-nav-link">
                                <i class="uil-calender"></i>
                                <span> Maintenance Report</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('vendorReports') }}" class="side-nav-link">
                                <i class="uil-calender"></i>
                                <span> Vendor Report</span>
                            </a>
                        </li>
                    </ul>


                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>

