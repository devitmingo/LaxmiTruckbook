@php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AddShortController;
@endphp
@extends('layouts.app')
@section('body')
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
hr{
    margin: 0rem 0!important;
 }
</style>

   <!-- Start Content-->
  <div class="container-fluid">

  <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Trips</h4>
                                    
                                </div>
                                </div>
                        </div>     
                        <!-- end page title --> 

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
                                                            <input type="hidden" id="myInput" class="form-control" onkeyup="myFunction()" placeholder="Search..">
                                                       
                                                            <label for="inputPassword4" class="form-label">From Date</label>
                                                             <input type="text" name="from_date"  id="from_date" class="form-control datepicker" 
                                                            value="{{ isset($_GET['from_date']) ? $_GET['from_date'] : ''  }}">
                                                        </div>
                                                        
                                                       <div class="col-md-2">
                                                            <label for="inputPassword4" class="form-label">To Date</label>
                                                            <input type="text" name="to_date"  id="to_date" class="form-control datepicker" id="inputCity"
                                                             value="{{ isset($_GET['to_date']) ? $_GET['to_date'] : ''  }}">
                                                       </div>
                                                        
                                                       <div class="col-md-2">
                                                            <label for="inputEmail4" class="form-label">Select Party</label>
                                                             <select id="partyName" name="partyName" class="form-select js-example-basic-single">
                                                               
                                                            </select>
                                                             <script> $("#partyName").val(<?php echo isset($_GET['partyName']) ? $_GET['partyName'] : ''  ?>);</script>
                                                        </div>
                                                        
                                                        <div class="col-md-2">
                                                            <label for="inputEmail4" class="form-label">Select Vehicle</label>
                                                             <select id="vehicleNumber" name="vehicleNumber" class="form-select js-example-basic-single">
                                                               
                                                            </select>
                                                             <script> $("#vehicleNumber").val(<?php echo isset($_GET['vehicleNumber']) ? $_GET['vehicleNumber'] : ''  ?>);</script>
                                                        </div> 
                                                       <div class="mb-2 col-md-2">
                                                           <label for="inputPassword4" class="form-label">Status</label>
                                                            <select id="status1" name="status" class="form-select js-example-basic-single">
                                                               <option value="">Select</option>
                                                               <option value="1">Start</option>
                                                               <option value="2">Complete Trip</option>
                                                               <option value="3">POD Received  </option>
                                                               <option value="4">POD Submited</option>
                                                               <option value="5">Settlement</option>
                                                           </select>
                                                            <script> $("#status1").val(<?php echo isset($_GET['status']) ? $_GET['status'] : ''  ?>);</script>
                                                      
                                                       </div>

                                                        
                                                 </div>
                                                   <button type="submit" class="btn btn-success"><i class="mdi mdi-account-search"></i> Search</button>
                                                   <a href="{{ route('trips.index') }}" type="reset" class="btn btn-danger"><i class="mdi mdi-refresh"></i> Reset</a>
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
                                        <a href="{{ route('trips.create') }}"><button  type="button" class="btn btn-primary right"> <i class="mdi mdi-plus-circle"></i> Add Trip</button></a>
                                        <a target="_blank" class="btn btn-warning" href="{{ route('pdfTripReports') }}?partyName=<?php echo isset($_GET['partyName']) ? $_GET['partyName'] : '';  ?>&from_date=<?php echo isset($_GET['from_date']) ? $_GET['from_date'] : ''  ?>&to_date=<?php echo isset($_GET['to_date']) ? $_GET['to_date'] : ''  ?>&vehicleNumber=<?php echo isset($_GET['vehicleNumber']) ? $_GET['vehicleNumber'] : ''  ?>&status=<?php echo isset($_GET['status']) ? $_GET['status'] : ''  ?>" >
                                        <i class="mdi mdi-file-pdf"></i> PDF</a>
                                        <br>
                                        </br>
                                        <ul class="nav nav-tabs nav-bordered mb-3">
                                            
                                        </ul> <!-- end nav-->
                                        <div class="tab-content" id="myTable">
                                            <div class="tab-pane show active" id="buttons-table-preview">
                                                <table  id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                                    <thead>
                                                        <tr>
                                                            <th>Truck No.<hr>
                                                            Transporter<hr>Status</th>
                                                            <th>Loading Date<hr>Unloading Date</th>
                                                            <th>From<hr>To</th>
                                                            <th>Trip Details</th>
                                                            <th>Shortage Amount</th>
                                                            <th>Advance</th>
                                                            <th>Extra</th>
                                                            <th>Total Party</th>
                                                            <th>Total Saving</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                
                                                
                                                   <tbody>
                                                   @foreach($records as $row)
                                                @php
                                                   $partyName = AdminController::getValueStatic2('parties','partyName','id',$row->partyName);
                                                  
                                                   $vehicleNumber = AdminController::getValueStatic2('vehicles','vehicleNumber','id',$row->vehicleNumber);
                                                   
                                                   $ownership = AdminController::getValueStatic2('vehicles','ownership','id',$row->vehicleNumber);
                                                   
                                                   $origin = AdminController::getValueStatic2('routes','name','id',$row->origin);
                                                   
                                                   $destination = AdminController::getValueStatic2('routes','name','id',$row->destination);
                                                   $material = AdminController::getValueStatic2('l_r_lists','material','trip_id',$row->id);

                                                   $supplierBalance= AddShortController::supplierBalance($row->id);

                                                  $loadig_weight = isset($row->party_unit_per) ? $row->party_unit_per : $row->truck_rate_per ;
                                                  $unloading_weight = $row->unload_weight_per;
                                                  $rate = isset($row->party_rate_per) ? $row->party_rate_per : $row->truck_unit_per;
                                                  $diesel_adv_transport = $row->diesel_adv_transport;
                                                  $driver_cash_transport = $row->driver_cash_transport;
                                                  $extra_diesel_amout = $row->extra_diesel_amout;
                                                  $extra_expenses = $row->extra_expenses;
                                                  $builty_commission = $row->builty_commission;
                                                  $toll_amount = $row->toll_amount;
                                                  $shortage_amount = $row->shortage_amount;

                                                   $short_amount = $rate*$loadig_weight - $rate*$unloading_weight;
                                                   
                                                  $partyBalance =$rate*$loadig_weight -$short_amount - $shortage_amount- $diesel_adv_transport  - $driver_cash_transport-$builty_commission;
                                                  $total_saving = $partyBalance - $extra_diesel_amout - $extra_expenses-$toll_amount;
                                                @endphp
                                                        <tr>
                                                            <td>{{ isset($vehicleNumber) ? $vehicleNumber : ''  }} 
                                                                <!-- <span style="color:blue;">( {{ isset($ownership) ? $ownership : ''  }} )</span> -->
                                                                <hr>{{ isset($partyName) ? $partyName : ''  }}
                                                                <hr><span  >
                                                                    @if($row->status==1)  
                                                                        Start  
                                                                    @elseif($row->status==2)
                                                                        Complete Trip
                                                                    @elseif($row->status==3)
                                                                        POD Received 
                                                                    @elseif($row->status==4)
                                                                        POD Submited
                                                                    @elseif($row->status==5)
                                                                        Settlement
                                                                    @endif 
                                                                </span>
                                                            </td>
                                                            <td>{{ date('d-m-Y',strtotime($row->startDate)) }} <hr> {{ date('d-m-Y',strtotime($row->endDate)) }}</td>
                                                            <td>{{ isset($origin) ? $origin : '' }} <hr> {{ isset($destination) ? $destination : '' }}  </td>
                                                            <td>(Material) {{ isset($material) ? $material : '' }}  <hr>
                                                                (Loading) ₹{{ isset($rate) ? $rate : '' }} x {{ isset($loadig_weight) ? $loadig_weight : '' }} = {{ $rate*$loadig_weight }}  <hr>
                                                                (Unloading) ₹{{ isset($rate) ? $rate : '' }} x {{ isset($unloading_weight) ? $unloading_weight : '' }} = {{ $rate*$unloading_weight }}</br>
                                                        </td>
                                                            <td>{{ isset($shortage_amount) ? "₹".number_format($shortage_amount,2) : ''  }}</td>
                                                            
                                                            <td>Diesel  - {{ isset($diesel_adv_transport) ? "₹".number_format($diesel_adv_transport,2) : ''  }}  <hr>
                                                            Driver Cash - {{ isset($driver_cash_transport) ? "₹".number_format($driver_cash_transport,2) : ''  }} <hr>
                                                            Builty Commission {{ isset($builty_commission) ? "₹".number_format($builty_commission,2) : ''  }}
                                                        </td>
                                                            
                                                            <td>Extra Diesel  = {{ isset($extra_diesel_amout) ? "₹".number_format($extra_diesel_amout,2) : ''  }} 
                                                            <hr>
                                                            Extra Expenses {{ isset($extra_expenses) ? "₹".number_format($extra_expenses,2) : ''  }}<hr>
                                                            Toll Amount - {{ isset($toll_amount) ? "₹".number_format($toll_amount,2) : ''  }}</td>
                                                            <td>{{ isset($partyBalance) ? "₹".number_format($partyBalance,2) : ''  }}</td>
                                                            <td>{{ isset($total_saving) ? "₹".number_format($total_saving,2) : ''  }}</td>
                                                            <td> 
                                                            <a href="{{ route('trips.show',$row->id) }}"><span class="btn btn-primary" > <i class="mdi mdi-eye-outline"></i> </span></a>
                                                             <a href="{{route('trips.edit',$row->id)}}" class="btn btn-success" rel="tooltip" title="Edit">
                                                                    <i class="mdi mdi-square-edit-outline"></i>
                                                                </a> 
                                                                <a href="#" onclick="return confirm('Are you sure to Delete?')" class="btn" rel="tooltip" title="Delete">
                                                                
                                                                <form action="{{route('trips.destroy',$row->id)}}" method="post">
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
  <script>
  $(document).ready(function(){

function sendRequest(){
    $.ajax({
        url: "{{ route('trips.indexAll',1) }}",
        success: function(data){    
            //do stuff with data..
        },
        complete: function() {
            setInterval(sendRequest, 60000); // Call AJAX every 5 mins (in milliseconds)
        }
    });
};

sendRequest();

});


//Fetch Parties list 

function fetchParty(id=0){
  
            $.ajax({
            type:'GET',
            url:'{{ url("common-get-select2") }}?table=parties&id=id&column=partyName',
            success:function(response){
                console.log(response);
                $("#partyName").html(response);
                $("#partyName").val(id);
                $('#partyName').trigger('change'); 
                document.getElementById("partyName").value = "<?php echo isset($data->partyName) ? $data->partyName : '' ?>";

            }
            });
        }   
//onload rung party function
fetchParty();

//Fetch Parties list 

function fetchVehicles(id=0){
  
  $.ajax({
  type:'GET',
  url:'{{ url("common-get-select2") }}?table=vehicles&id=id&column=vehicleNumber',
  success:function(response){
      console.log(response);
      $("#vehicleNumber").html(response);
      $("#vehicleNumber").val(id);
      $('#vehicleNumber').trigger('change'); 
      document.getElementById("vehicleNumber").value = "<?php echo isset($data->vehicleNumber) ? $data->vehicleNumber : '' ?>";

  }
  });
}   
//onload rung party function
fetchVehicles();

//Fetch Supplier List

  function fetchOrigin(id=0){
  
            $.ajax({
            type:'GET',
            url:'{{ url("common-get-select2") }}?table=routes&id=id&column=name',
            success:function(response){
                //console.log(response);
                $(".routes").html(response);
                $(".routes").val(id);
                $('.routes').trigger('change'); 
                document.getElementById("origin").value = "<?php echo isset($data->origin) ? $data->origin : '' ?>";
                document.getElementById("destination").value = "<?php echo isset($data->destination) ? $data->destination : '' ?>";
            }
            });
        }   
//onload run party
fetchOrigin();

  </script>  
  
  
@endsection