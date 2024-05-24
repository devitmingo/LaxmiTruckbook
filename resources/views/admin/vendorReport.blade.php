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
                                                             <input type="date" name="fromDate"  id="fromDate" class="form-control" 
                                                            value="{{ isset($_GET['fromDate']) ? $_GET['fromDate'] : ''  }}">
                                                        </div>
                                                        
                                                       <div class="col-md-2">
                                                            <label for="inputPassword4" class="form-label">To Date</label>
                                                            <input type="date" name="toDate"  id="toDate" class="form-control" id="inputCity"
                                                             value="{{ isset($_GET['toDate']) ? $_GET['toDate'] : ''  }}">
                                                       </div>
                                                        
                                                       <div class="col-md-2">
                                                            <label for="inputEmail4" class="form-label">Select Vendor</label>
                                                             <select id="vendorName" name="vendorName" class="form-select js-example-basic-single">
                                                               
                                                            </select>
                                                             <script> $("#vendorName").val(<?php echo isset($_GET['vendorName']) ? $_GET['vendorName'] : ''  ?>);</script>
                                                        </div>
                                                       
                                                        <div class="col-md-2">
                                                            </br>
                                                            <button type="submit" class="btn btn-primary">Search</button>
                                                            <a href="{{ route('vendorReports') }}" type="submit" class="btn btn-danger">Reset</a>
                                                        </div>

                                                        
                                                 </div>
                                                   
                                                </form>                      
                                            </div> <!-- end preview-->
                                        
                                           
                                        </div> <!-- end tab-content-->

                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>

                    @if(isset($records))
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <a href="{{ route('trips.create') }}"><button  type="button" class="btn btn-primary right"> + Add Trip</button></a>
                                        <br>
                                        </br>
                                        <ul class="nav nav-tabs nav-bordered mb-3">
                                            
                                        </ul> <!-- end nav-->
                                        <div class="tab-content" id="myTable">
                                            <div class="tab-pane show active" id="buttons-table-preview">
                                                <table  id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                                    <thead>
                                                        <tr>
                                                            <th>Date</th>
                                                            <th>Maintenance/Vendor Name</th>
                                                            <th>Cr Amount</th>
                                                            <th>Dr Amount</th>
                                                            <th>Balance</th>
                                                        </tr>
                                                        <tr>
                                                            <th colspan="4" style="text-align:right;">Opening Bal</th>
                                                            <th>{{ number_format($openingBalance,2) }}</th>
                                                        </tr>
                                                    </thead>
                                                
                                                
                                                   <tbody>
                                                   @foreach($records as $row)
                                                    @php
                                                        if($row->type=='cr'){
                                                            $vehicle = AdminController::getValueStatic2('vehicles','vehicleNumber','id',$row->name);
                                                            $openingBalance += $row->amount;
                                                        }

                                                        if($row->type=='dr'){
                                                            $vehicle = AdminController::getValueStatic2('vendors','vendorName','id',$row->name);
                                                            $openingBalance -= $row->amount;
                                                        }

                                                    @endphp


                                                        <tr>
                                                        <td>{{ date('d-m-Y',strtotime($row->date)) }} </td>
                                                        <td> {{ isset($vehicle) ? $vehicle : ''  }}</td>
                                                       
                                                        @if($row->type=='cr')
                                                        <td> {{ isset($row->amount) ? number_format($row->amount,2)  : ''  }} {{ isset($row->type) ? $row->type : '' }}</td>
                                                        <td> </td>
                                                        @endif
                                                        @if($row->type=='dr')
                                                        <td> </td>
                                                        <td> {{ isset($row->amount) ? number_format($row->amount,2) : ''  }} {{ isset($row->type) ? $row->type : '' }}</td>
                                                        @endif
                                                        <td> {{ isset($openingBalance) ? number_format($openingBalance,2) : ''  }}</td>
                                                        </tr>


                                                    
                                                    @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th colspan="4" style="text-align:right;">Closing Bal</th>
                                                            <th>{{ number_format($openingBalance,2) }}</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>                                           
                                            </div> <!-- end preview-->
                                        
                                           
                                        </div> <!-- end tab-content-->
                                        
                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->
                        </div>
                        <!-- end row-->
                    @endif
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
            url:'{{ url("common-get-select2") }}?table=vendors&id=id&column=vendorName',
            success:function(response){
                console.log(response);
                $("#vendorName").html(response);
                $("#vendorName").val(id);
                $('#vendorName').trigger('change'); 
                document.getElementById("vendorName").value = "<?php echo isset($_GET['vendorName']) ? $_GET['vendorName'] : ''?>";

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