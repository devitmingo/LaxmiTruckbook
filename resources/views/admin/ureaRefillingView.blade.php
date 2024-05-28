
@php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AddShortController;
@endphp
@extends('layouts.app')
@section('body')
   <!-- Start Content-->
  <div class="container-fluid">


                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                     <h4>Urea Refilling List</h4>
                                     <a href="{{ route('urea.create') }}"><button  type="button" class="btn btn-primary right"> + Add Urea Refilling</button></a>
                                        <br>
                                        </br>
                                        <ul class="nav nav-tabs nav-bordered mb-3">
                                            
                                        </ul> <!-- end nav-->
                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="buttons-table-preview">
                                                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                                    <thead>
                                                        <tr>
                                                            <th>S.N.</th>
                                                            <th>Vehicle Number</th>
                                                            <th>Driver Name</th>
                                                            <th>Place</th>
                                                            <th>Meter Reading</th>
                                                            <th>Refilling Date</th>
                                                            <th>Liter</th>
                                                            <th>Self/Warranty</th>
                                                            <th>Amount</th>
                                                            <th>Payment Type</th>
                                                            <th>Vendor Name</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                
                                                
                                                   <tbody>
                                                        @foreach($records as $row)
                                                        @php
                                                            $vehicle = AdminController::getValueStatic2('vehicles','vehicleNumber','id',$row->vehicle_id);
                                                            $driver = AdminController::getValueStatic2('drivers','driverName','id',$row->driver_id);
                                                            if(isset($row->vendorName)){
                                                                $vendor = AdminController::getValueStatic2('vendors','vendorName','id',$row->vendorName);
                                                            }
                                                        @endphp
                                                        <tr>
                                                            <td>{{ $loop->index+1 }}</td>
                                                            <td>{{ isset($vehicle) ? $vehicle : '' }}</td>
                                                            <td>{{ isset($driver) ? $driver : '' }}</td>
                                                            <td>{{ isset($row->place) ? $row->place : '' }}</td>
                                                            <td>{{ isset($row->meter_reading) ? $row->meter_reading : '' }}</td>
                                                            <td>{{ isset($row->refilling_date) ? date('d-m-Y',strtotime($row->refilling_date)) : '' }}</td>
                                                            <td>{{ isset($row->liter) ? $row->liter : '' }}</td>
                                                            <td>{{ isset($row->self_warranty) ? $row->self_warranty : '' }}</td>
                                                            <td>{{ isset($row->amount) ? number_format($row->amount,2) : ''  }}</td>
                                                            <td>{{ isset($row->paymentType) ? $row->paymentType : '' }}</td>
                                                            <td>{{ isset($vendor) ? $vendor  : '' }}</td>
                                                           <td><a href="{{route('urea.edit',$row->id)}}" class="btn btn-success" rel="tooltip" title="Edit">
                                                                    <i class="mdi mdi-square-edit-outline"></i>
                                                                </a>
                                                                <a href="#" class="btn" rel="tooltip" title="Delete">
                                                                
                                                                <form action="{{route('urea.destroy',$row->id)}}" method="post">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button type="submit" class="btn btn-danger">
                                                                    
                                                                    <i class="mdi mdi-window-close" onclick="return confirm('Are you sure to Delete?')"></i>
                                                                    </button>
                                                                </form>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        @php $vendor = ''; @endphp
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
