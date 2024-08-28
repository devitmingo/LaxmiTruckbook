@php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AddShortController;
@endphp
@extends('layouts.app')
@section('body')
<?php  $date = date('d-m-Y'); ?>
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
                                    <h4 class="page-title">Truck Profit Ledger</h4>
                                    
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
                                               <form action="" method="get" autocomplete="off">
                                               
                                               @csrf
                                                    <div class="row g-2">
                                                      <div class="col-md-2">
                                                            <input type="hidden" id="myInput" class="form-control" onkeyup="myFunction()" placeholder="Search..">
                                                       
                                                            <label for="inputPassword4" class="form-label">From Date</label>
                                                             <input type="text" name="fromDate"  id="fromDate" class="form-control datepicker" 
                                                            value="{{ isset($_GET['fromDate']) ? $_GET['fromDate'] : $date  }}">
                                                        </div>
                                                        
                                                       <div class="col-md-2">
                                                            <label for="inputPassword4" class="form-label">To Date</label>
                                                            <input type="text" name="toDate"  id="toDate" class="form-control datepicker" 
                                                             value="{{ isset($_GET['toDate']) ? $_GET['toDate'] : $date  }}">
                                                       </div>
                                                        
                                                       <div class="col-md-2">
                                                            <label for="inputEmail4" class="form-label">Select Vendor</label>
                                                             <select id="vehicleNumber" name="vehicleNumber" class="form-select js-example-basic-single">
                                                               
                                                            </select>
                                                             <script> $("#vehicleNumber").val(<?php echo isset($_GET['vehicleNumber']) ? $_GET['vehicleNumber'] : ''  ?>);</script>
                                                        </div>
                                                       
                                                        <div class="col-md-2">
                                                            </br>
                                                            <button type="submit" class="btn btn-success"><i class="mdi mdi-account-search"></i>  Search</button>
                                                            <a href="{{ route('vendorReports') }}" type="submit" class="btn btn-danger"><i class="mdi mdi-refresh"></i> Reset</a>
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
                                       
                                        <ul class="nav nav-tabs nav-bordered mb-3">
                                        <a target="_blank" class="btn btn-primary" href="{{ route('pdfTruckProfitLedgerReports') }}?vehicleNumber=<?php echo isset($_GET['vehicleNumber']) ? $_GET['vehicleNumber'] : '';  ?>&fromDate=<?php echo isset($_GET['fromDate']) ? $_GET['fromDate'] : ''  ?>&toDate=<?php echo isset($_GET['toDate']) ? $_GET['toDate'] : ''  ?>" >Truck Profit Ledger Report</a>
                                        </ul> <!-- end nav-->
                                        <div class="tab-content" id="myTable">
                                            <div class="tab-pane show active" id="buttons-table-preview">
                                                <table  id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                                    <thead>
                                                        <tr>
                                                            <th>Date</th>
                                                            <th>Maintenance/Vendor Name</th>
                                                            <th>Description</th>
                                                            <th>Cr Amount</th>
                                                            <th>Dr Amount</th>
                                                            <th>Balance</th>
                                                        </tr>
                                                        
                                                    </thead>
                                                
                                                
                                                   <tbody>
                                                    @php $balance = 0; @endphp
                                                   @foreach($records as $row)
                                                    @php
                                                        if($row->type=='cr'){
                                                            $vehicle = AdminController::getValueStatic2('vehicles','vehicleNumber','id',$row->name);
                                                           
                                                        }

                                                        if($row->type=='dr'){
                                                            $vehicle = AdminController::getValueStatic2('vendors','vendorName','id',$row->name);
                                                            
                                                        }
                                                        if($row->page==1){
                                                            $trip_profit = AddShortController::truckProfit($row->id, date('Y-m-d',strtotime($_GET['fromDate'])),  date('Y-m-d',strtotime($_GET['toDate'])));
                                                            $type='Trip';
                                                            
                                                        }elseif($row->page==8){
                                                            $type='Urea Refilling';
                                                        }elseif($row->page==7){
                                                            $type = 'Tyre';
                                                        }elseif($row->page==12){
                                                            $type = 'Vendor Payment';
                                                        }elseif($row->page==9){
                                                            $maintenance = AdminController::getValueStatic2('maintenance_forms','maintenance','id',$row->id);
                                                            $maintenance_name = AdminController::getValueStatic2('maintenances','name','id',$maintenance);
                                                            $type = $maintenance_name ;
                                                        }else{
                                                            $type = '';
                                                        }
                                                        $dr = array("8", "7", "9");
                                                    @endphp


                                                        <tr>
                                                        <td>{{ date('d-m-Y',strtotime($row->date)) }} </td>
                                                        <td> {{ isset($vehicle) ? $vehicle : ''  }}</td>
                                                        <td> {{ isset($type) ? $type : ''  }}</td>
                                                        @if($row->page=='1')
                                                        <td> {{ isset($trip_profit) ? number_format($trip_profit,2)  : ''  }} </td>
                                                        <td> </td>
                                                        @php $balance += $trip_profit; @endphp
                                                        @endif
                                                        @if(in_array($row->page, $dr))
                                                        <td> </td>
                                                        <td> {{ isset($row->amount) ? number_format($row->amount,2) : ''  }} </td>
                                                        @php $balance -= $row->amount; @endphp
                                                        @endif
                                                        <td> {{ isset($balance) ? number_format($balance,2) : ''  }}</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th colspan="5" style="text-align:right;">Closing Bal</th>
                                                            <th>{{ number_format($balance,2) }}</th>
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
        //Fetch Parties list 

        function fetchParty(id=0){
        
                    $.ajax({
                    type:'GET',
                    url:'{{ url("common-get-select2") }}?table=vehicles&id=id&column=vehicleNumber',
                    success:function(response){
                        console.log(response);
                        $("#vehicleNumber").html(response);
                        $("#vehicleNumber").val(id);
                        $('#vehicleNumber').trigger('change'); 
                        document.getElementById("vehicleNumber").value = "<?php echo isset($_GET['vehicleNumber']) ? $_GET['vehicleNumber'] : ''?>";

                    }
                    });
                }   
        //onload rung party function
        fetchParty();

  </script>  
  
  
@endsection