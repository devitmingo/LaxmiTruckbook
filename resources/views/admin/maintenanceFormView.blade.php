@php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AddShortController;
@endphp
@extends('layouts.app')
@section('body')
   <!-- Start Content-->
  <div class="container-fluid">

  <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Maintenance Report</h4>
                                    
                                </div>
                                <div class="tab-content">
                                            <div class="tab-pane show active" id="form-row-preview">
                                               <form action="" method="get">
                                               
                                               @csrf
                                                    <div class="row g-2">
                                                      <div class="col-md-2">
                                                             <label for="inputPassword4" class="form-label">From Date</label>
                                                             <input type="text" name="from_date"  id="from_date" class="form-control datepicker" 
                                                            value="{{ isset($fromDate) ? date('d-m-Y',strtotime($fromDate)) : $date  }}">
                                                        </div>
                                                        
                                                       <div class="col-md-2">
                                                            <label for="inputPassword4" class="form-label">To Date</label>
                                                            <input type="text" name="to_date"  id="to_date" class="form-control datepicker" id="inputCity"
                                                             value="{{ isset($toDate) ? date('d-m-Y',strtotime($toDate)) : $date  }}">
                                                       </div>
                                                        
                                                      
                                                        <div class="col-md-2">
                                                            <label for="inputEmail4" class="form-label">Select Vehicle</label>
                                                             <select id="vehicleNumber" name="vehicleNumber" class="form-select js-example-basic-single">
                                                                <option value="">--Choose Vehicle--</option> 
                                                                @foreach($vehicle as $row)
                                                                    <option value="{{ $row->id }}">{{ $row->vehicleNumber }}</option>
                                                                @endforeach             
                                                            </select>
                                                        </div> 
                                                        <div class="col-md-2" style="margin-top:42px;">
                                                           
                                                            <button type="submit" class="btn btn-success"><i class="mdi mdi-account-search"></i> Search</button>
                                                            <a href="{{ route('urea.index') }}" type="reset" class="btn btn-danger"><i class="mdi mdi-refresh"></i> Reset</a>
                                                        </div>
                                                 </div>
                                                  
                                                </form>                      
                                            </div> <!-- end preview-->
                                        
                                           
                                        </div> <!-- end tab-content-->
                                </div>
                        </div>     
                        <!-- end page title --> 



                        <div class="row">
                            <x-alert/>
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <a href="{{ route('maintenanceForm.create') }}"><button  type="button" class="btn btn-primary right"> + Add Maintenance</button></a>
                                        <a href="{{ route('pdfMaintenanceReports') }}?from_date=<?php echo isset($_GET['from_date']) ? $_GET['from_date'] : ''  ?>&to_date=<?php echo isset($_GET['to_date']) ? $_GET['to_date'] : ''  ?>&vehicleNumber=<?php echo isset($_GET['vehicleNumber']) ? $_GET['vehicleNumber'] : ''  ?>" target="_blank"><button  type="button" class="btn btn-warning right"> <i class="mdi mdi-file-pdf"></i> Maintenance Report PDF</button></a>
                                     
                                        <br>
                                        </br>
                                        <ul class="nav nav-tabs nav-bordered mb-3">
                                            
                                        </ul> <!-- end nav-->
                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="buttons-table-preview">
                                                <table  class="table table-striped dt-responsive nowrap w-100">
                                                    <thead>
                                                        <tr>
                                                            <th>SN</th>
                                                            <th>Date</th>
                                                            <th>Vehicle Number<hr>
                                                            Maintenance Name</th>
                                                            <th>Meter Reading<hr>
                                                            Driver Name</th>
                                                           
                                                            <th>Product Type<hr>
                                                            Shop Name</th>
                                                            <th>Place</th>
                                                            
                                                            <th>Self/Warranty</th>
                                                            <th>Amount<hr>
                                                            Payment Type</th>
                                                            <th>Staff</th>
                                                            <th>Vendor Name</th>
                                                            <th>Notes</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                
                                                
                                                   <tbody>
                                                        @foreach($records as $row)
                                                        @php
                                                        
                                                        $vehicleNumber = AdminController::getValueStatic2('vehicles','vehicleNumber','id',$row->vehicleNumber);
                                                        $driverName = AdminController::getValueStatic2('drivers','driverName','id',$row->driverName);
                                                        $maintenances = AdminController::getValueStatic2('maintenances','name','id',$row->maintenance);
                                                        if($row->vendorName!=''){
                                                            $vendorName = AdminController::getValueStatic2('vendors','vendorName','id',$row->vendorName);
                                                        }else{
                                                            $vendorName = '';
                                                        }
                                                        @endphp
                                                        <tr>
                                                            <td>{{ $loop->index+1 }}</td>
                                                            <td>{{ date('d-m-Y',strtotime($row->date))}}</td>
                                                            <td>{{ isset($vehicleNumber) ? $vehicleNumber : '' }}<hr>
                                                            {{ isset($maintenances) ? $maintenances : '' }}</td>
                                                            <td>{{ isset($row->meterReading) ? $row->meterReading : '' }}<hr>
                                                            {{ isset($driverName) ? $driverName : '' }}</td>
                                                            <td>{{ isset($row->productType) ? $row->productType : '' }}<hr>
                                                            {{ isset($row->shop_name) ? $row->shop_name : '' }}</td>
                                                            <td>{{ isset($row->place) ? $row->place : '' }}</td>
                                                            <td>{{ isset($row->self_warranty) ? $row->self_warranty : '' }}</td>
                                                            <td>{{ isset($row->amount) ? "₹".number_format($row->amount,2) : '' }}<hr>{{ isset($row->paymentType) ? $row->paymentType : '' }}</td>
                                                            <td>{{ isset($row->staff) ? $row->staff : '' }}</td>
                                                            <td>{{ isset($vendorName) ? $vendorName : '' }}</td>
                                                            <td>{{ isset($row->notes) ? $row->notes : '' }}</td>
                                                            
                                                             <td>
                                                             <a href="{{route('maintenanceForm.edit',$row->id)}}" class="btn btn-success" rel="tooltip" title="Edit">
                                                                    <i class="mdi mdi-square-edit-outline"></i>
                                                                </a>
                                                                <a href="#" class="btn" onclick="return confirm('Are you sure ? Do you want to Delete?')" rel="tooltip" title="Delete">
                                                                
                                                                <form action="{{route('maintenanceForm.destroy',$row->id)}}" method="post">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button type="submit" class="btn btn-danger">
                                                                    
                                                                    <i class="mdi mdi-window-close" ></i>
                                                                    </button>
                                                                </form>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>                                           
                                            </div> <!-- end preview-->
                                        
                                           
                                        </div> <!-- end tab-content-->
                                        
                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->
                        </div>
                        <!-- end row-->

  </div>                  
@endsection