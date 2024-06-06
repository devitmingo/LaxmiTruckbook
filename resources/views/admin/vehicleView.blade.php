@php
use App\Http\Controllers\AdminController;
@endphp
@extends('layouts.app')
@section('body')
   <!-- Start Content-->
  <div class="container-fluid">

  <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Vehicle List</h4>
                                    
                                </div>
                                </div>
                        </div>     
                        <!-- end page title --> 



                        <div class="row">
                            <x-alert/>
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <a href="{{ route('vehicle.create') }}"><button  type="button" class="btn btn-primary right"> + Add Vehicle</button></a>
                                        <br>
                                        </br>
                                        <ul class="nav nav-tabs nav-bordered mb-3">
                                            
                                        </ul> <!-- end nav-->
                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="buttons-table-preview">
                                                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                                    <thead>
                                                        <tr>
                                                            <th>SN</th>
                                                            <th>Vehicle Number</th>
                                                            <th>Vehicle Type</th>
                                                            
                                                            <th>Vehice Tyre</th>
                                                            <th>Vehice Model</th>
                                                            
                                                            <th>Chassis No</th>
                                                            <th>Engine No</th>
                                                            <th>Documents</th>

                                                            <th>Expiry Date</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                
                                                
                                                   <tbody>
                                                        @foreach($records as $row)

                                                        @php 
                                                         $vType = AdminController::getValueStatic2('truck_types','truckName','id',$row->vehicleType);
                                                        
                                                        @endphp
                                                        <tr>
                                                            <td>{{ $loop->index+1 }}</td>
                                                            <td>{{ $row->vehicleNumber }}  <hr> ({{ isset($row->ownership) ? $row->ownership : '' }})</td>
                                                            <td>{{ $vType }}</td>
                                                            
                                                            <td>{{ isset($row->vehicle_tyre) ? $row->vehicle_tyre : '' }}</td>
                                                            <td>{{ isset($row->vehicle_model) ? $row->vehicle_model : '' }}</td>
                                                            
                                                            <td>{{ isset($row->chassis_no) ? $row->chassis_no : '' }}</td>
                                                            <td>{{ isset($row->engine_no) ? $row->engine_no : '' }}</td>
                                                            <td>
                                                                @if(isset($row->insurance_expiry_date) && $row->insurance_expiry_date !='1970-01-01' )
                                                                    {{ "Insurance  Expiry Date".date('d-m-Y',strtotime($row->insurance_expiry_date)) }} 
                                                                 @endif
                                                                 <hr>
                                                                @if(isset($row->tax_pay_expiry_date) && $row->tax_pay_expiry_date !='1970-01-01' ) 
                                                                    {{ "Tax Pay Expiry Date - ".$row->tax_pay_expiry_date }} 
                                                                @endif
                                                                <hr>
                                                                 @if(isset($row->fitness_expiry_date) && $row->fitness_expiry_date !='1970-01-01' )
                                                                    {{ "Fitness Expiry Date -".$row->fitness_expiry_date }}
                                                                @endif
                                                                <hr>
                                                                @if(isset($row->permit_expiry_date) && $row->permit_expiry_date !='1970-01-01' )
                                                                    {{ "Permit Expiry Date -".$row->permit_expiry_date }}
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <a href="{{ url('vehicle_doc/'.$row->insurance_document) }}" target="_blank">@if($row->insurance_document) {{ "Insurance Documents" }} @endif</a>
                                                                    <hr>
                                                                <a href="{{ url('vehicle_doc/'.$row->tax_pay_document) }}" target="_blank">@if($row->insurance_document) {{ "Tax Pay Documents" }} @endif</a>
                                                                <hr>
                                                                <a href="{{ url('vehicle_doc/'.$row->fitness_document) }}" target="_blank">@if($row->fitness_document) {{ "Fitness Documents" }} @endif</a>
                                                                <hr>
                                                                <a href="{{ url('vehicle_doc/'.$row->permit_document) }}" target="_blank">@if($row->permit_document) {{ "Permit Documents"  }} @endif</a>
                                                                <hr>
                                                                <a href="{{ url('vehicle_doc/'.$row->r_c_document) }}" target="_blank">@if($row->r_c_document) {{"R C Documents" }} @endif </a>
                                                                
                                                            </td>
                                                            <td>@if($row->status==1)  Enable @else Disable  @endif </td>

                                                             <td>
                                                                <a href="{{route('vehicle.edit',$row->id)}}" class="btn btn-success" rel="tooltip" title="Edit">
                                                                    <i class="mdi mdi-square-edit-outline"></i>
                                                                </a>
                                                                <!-- <a href="#" class="btn" rel="tooltip" title="Delete">
                                                                
                                                                <form action="{{route('vehicle.destroy',$row->id)}}" method="post">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button type="submit" class="btn btn-danger">
                                                                    
                                                                    <i class="mdi mdi-window-close" onclick="return confirm('Are you sure to Delete?')"></i>
                                                                    </button>
                                                                </form>
                                                                </a> -->
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