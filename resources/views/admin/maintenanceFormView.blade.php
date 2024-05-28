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
                                </div>
                        </div>     
                        <!-- end page title --> 



                        <div class="row">
                            <x-alert/>
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <a href="{{ route('maintenanceForm.create') }}"><button  type="button" class="btn btn-primary right"> + Add Maintenance</button></a>
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
                                                            <th>Maintenance Name</th>
                                                            <th>Vehicle Number</th>
                                                            <th>Driver Name</th>
                                                            <th>Meter Reading</th>
                                                            <th>Product Type</th>
                                                            <th>Shop Name</th>
                                                            <th>Place</th>
                                                            <th>Staff</th>
                                                            <th>Self/Warranty</th>
                                                            <th>Amount</th>
                                                            <th>Payment Type</th>
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
                                                            <td>{{ isset($maintenances) ? $maintenances : '' }}</td>
                                                            <td>{{ isset($vehicleNumber) ? $vehicleNumber : '' }}</td>
                                                            <td>{{ isset($driverName) ? $driverName : '' }}</td>
                                                            <td>{{ isset($row->meterReading) ? $row->meterReading : '' }}</td>
                                                            <td>{{ isset($row->productType) ? $row->productType : '' }}</td>
                                                            <td>{{ isset($row->shop_name) ? $row->shop_name : '' }}</td>
                                                            <td>{{ isset($row->place) ? $row->place : '' }}</td>
                                                            <td>{{ isset($row->staff) ? $row->staff : '' }}</td>
                                                            <td>{{ isset($row->self_warranty) ? $row->self_warranty : '' }}</td>
                                                            <td>{{ isset($row->amount) ? "₹".number_format($row->amount,2) : '' }}</td>
                                                            <td>{{ isset($row->paymentType) ? $row->paymentType : '' }}</td>
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