<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!--- Sidemenu -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

              

                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
                        <i class="uil-home-alt"></i>

                        <span> Dashboards </span>
                    </a>

                </li>
                <li class="nav-item">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" >
                        <i class="uil-store"></i>
                        <span> Master </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <ul class="side-nav-second-level">
                            <li>
                                <a href="{{ route('session.create') }}" class="dropdown-item">
                                <i class="uil-calender"></i>
                                <span>Add session</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('party.index') }}" class="dropdown-item">
                                <i class="uil-calender"></i>
                                <span>Add Party</span>
                                </a>
                            </li>
                            <li style="display:none;">
                                <a href="{{ route('supplier.index') }}" class="dropdown-item">
                                <i class="uil-calender"></i>
                                <span>Add Supplier</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('driver.index') }}" class="dropdown-item">
                                <i class="uil-calender"></i>
                                <span>Add Drivers</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('vehicleType.index') }}" class="dropdown-item">
                                <i class="uil-calender"></i>
                                <span>Add Vehicle Type</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('billType.index') }}" class="dropdown-item">
                                <i class="uil-calender"></i>
                                <span>Add Bill Type</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('vehicle.index') }}" class="dropdown-item">
                                <i class="uil-calender"></i>
                                <span>Add Vehicle</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('state.index') }}" class="dropdown-item">
                                <i class="uil-calender"></i>
                                <span>Add State</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('route.index') }}" class="dropdown-item"> 
                                <i class="uil-calender"></i>
                                <span>Add Route</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('maintenance.index') }}" class="dropdown-item">
                                <i class="uil-calender"></i>
                                <span>Add Maintenance</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('vendor.index') }}" class="dropdown-item">
                                <i class="uil-calender"></i>
                                <span>Add Vendor</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>




                <li class="nav-item">
                    <a href="{{ route('trips.indexAll',1) }}" class="side-nav-link">
                        <i class="mdi mdi-truck"></i>
                        <span> Trips </span>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="{{ route('trips.index') }}" class="side-nav-link">
                        <i class="mdi mdi-table-large"></i>
                        <span> Trip Reports</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ Route('tyre.create') }}" class="side-nav-link">
                        <i class="uil-calender"></i>
                        <span> Tyre Entry </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ Route('urea.index') }}" class="side-nav-link">
                        <i class="uil-calender"></i>
                        <span> Urea Refilling </span>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a href="{{ Route('supplierReport') }}" class="side-nav-link">
                        <i class="uil-calender"></i>
                        <span> Supplier Balance Reports </span>
                    </a>
                </li> -->

                <li class="nav-item">
                    <a href="{{ route('partyReport') }}" class="side-nav-link">
                        <i class="uil-calender"></i>
                        <span> Party Balance Reports </span>
                    </a>
                </li>


            <!-- <li class="nav-item">
                <a href="{{ Route('supplierledgerReport') }}" class="side-nav-link">
                    <i class="uil-calender"></i>
                    <span> Supplier Reports </span>
                </a>
            </li> -->

            <li class="nav-item">
                <a href="{{ route('partyLedgerReport') }}" class="side-nav-link">
                    <i class="uil-calender"></i>
                    <span> Party  Reports </span>
                </a>
            </li>

            <!-- <li class="nav-item">
                <a href="{{ route('companyLedger') }}" class="side-nav-link">
                    <i class="uil-calender"></i>
                    <span>Company Ledger</span>
                </a>
            </li> -->



            <li class="nav-item">
                <a href="{{ route('trans.create') }}" class="side-nav-link">
                    <i class="uil-calender"></i>
                    <span> Transactions </span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('maintenanceForm.create') }}" class="side-nav-link">
                    <i class="uil-calender"></i>
                    <span> Maintenance </span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('maintenanceForm.index') }}" class="side-nav-link">
                    <i class="uil-calender"></i>
                    <span> Maintenance Report</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('vendorReports') }}" class="side-nav-link">
                    <i class="uil-calender"></i>
                    <span> Vendor Report</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('truckReports') }}" class="side-nav-link">
                    <i class="uil-calender"></i>
                    <span> Truck Profit Report</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('truckReportLedger') }}" class="side-nav-link">
                    <i class="uil-calender"></i>
                    <span> Truck Profit Ledger</span>
                </a>
            </li>
        </ul>
      
    </div>
  </div>
</nav>