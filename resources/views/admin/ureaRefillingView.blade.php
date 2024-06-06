
@php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AddShortController;
@endphp
@extends('layouts.app')
@section('body')
<?php  $date = date('d-m-Y'); ?>
   <!-- Start Content-->
  <div class="container-fluid">
  <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                 
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
                                                               
                                                            </select>
                                                        </div> 
                                                        <div class="col-md-2" style="margin-top:42px;">
                                                           
                                                            <button type="submit" class="btn btn-primary"><i class="mdi mdi-account-search"></i> Search</button>
                                                            <a href="{{ route('urea.index') }}" type="reset" class="btn btn-warning"><i class="mdi mdi-refresh"></i> Reset</a>
                                                        </div>
                                                 </div>
                                                  
                                                </form>                      
                                            </div> <!-- end preview-->
                                        
                                           
                                        </div> <!-- end tab-content-->

                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>    

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                     <h4>Urea Refilling List</h4>
                                     <a href="{{ route('urea.create') }}"><button  type="button" class="btn btn-primary right"> + Add Urea Refilling</button></a>
                                     <a href="{{ route('pdfUreaReports') }}?from_date=<?php echo isset($_GET['from_date']) ? $_GET['from_date'] : ''  ?>&to_date=<?php echo isset($_GET['to_date']) ? $_GET['to_date'] : ''  ?>&vehicleNumber=<?php echo isset($_GET['vehicleNumber']) ? $_GET['vehicleNumber'] : ''  ?>" target="_blank"><button  type="button" class="btn btn-warning right"> <i class="mdi mdi-file-pdf"></i> Urea Report PDF</button></a>
                                      
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
                                                            <th>Ltr</th>
                                                            <th>Self/Warranty</th>
                                                            <th>Amount</th>
                                                            <th>Payment Type</th>
                                                            <th>Vendor Name</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                
                                                
                                                   <tbody>
                                                    @php $total =0; @endphp
                                                        @foreach($records as $row)
                                                        @php
                                                            $vehicle = AdminController::getValueStatic2('vehicles','vehicleNumber','id',$row->vehicle_id);
                                                            $driver = AdminController::getValueStatic2('drivers','driverName','id',$row->driver_id);
                                                            if(isset($row->vendorName)){
                                                                $vendor = AdminController::getValueStatic2('vendors','vendorName','id',$row->vendorName);
                                                            }
                                                            $total +=$row->amount;
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
                                                        <tfoot>
                                                            <tr>
                                                                <th colspan="8" style="float:right;">Total Amount</th>
                                                                <th>{{ isset($total) ? $total : ''}} </th>
                                                                <th colspan="3"></th>
                                                            </tr>
                                                        </tfoot>
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
<script>
    function fetchVehicles(id=0){
  
        $.ajax({
        type:'GET',
        url:'{{ url("common-get-select2") }}?table=vehicles&id=id&column=vehicleNumber',
        success:function(response){
            console.log(response);
            $("#vehicleNumber").html(response);
            $("#vehicleNumber").val(id);
            $('#vehicleNumber').trigger('change'); 
            document.getElementById("vehicleNumber").value = "<?php echo isset($_GET['vehicleNumber']) ? $_GET['vehicleNumber'] : ''  ?>";

        }
        });
    }   
//onload rung party function
fetchVehicles();

 </script>
@endsection
