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
                                    <h4 class="page-title">Party Report</h4>
                                    
                                </div>
                                </div>
                        </div>     
                        <!-- end page title --> 



         <div class="row">
                            <form>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="mb-2 col-md-2">
                                                <input class="form-control datepicker" type="text" name="from_date" id="from_date" value="<?php echo isset($_GET['from_date']) ? date('d-m-Y',strtotime($_GET['from_date'])) :  date('d-m-Y') ?>" />
                                            </div>

                                            <div class="mb-2 col-md-2">
                                                <input  class="form-control datepicker" type="test" name="to_date" id="to_date" value="<?php echo isset($_GET['to_date']) ? date('d-m-Y',strtotime($_GET['to_date'])) :  date('d-m-Y') ?>"/>
                                            </div>

                                            <div class="mb-3 col-md-3">
                                                <select class="form-select js-example-basic-single advanceType" name="id" id="id" >
                                                    <option value="bg-danger" selected>Select</option>
                                                </select>
                                                <script>document.getElementById("id").value = "<?php echo isset($_GET['id']) ? $_GET['id'] : '';  ?>"; </script>

                                            </div>
                                            <div class="mb-3 col-md-3">
                                                <button class="btn btn-success pull-right"><i class="mdi mdi-account-search"></i> Search</button>  
                                                <a href="{{ Route('partyLedgerReport') }}" class="btn btn-danger pull-right"><i class="mdi mdi-refresh"></i> Reset</a>  
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </form>
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                    <a target="_blank" class="btn btn-warning" href="{{ route('partyledgerPdf') }}?id=<?php echo isset($_GET['id']) ? $_GET['id'] : '';  ?>&from_date=<?php echo isset($_GET['from_date']) ? $_GET['from_date'] : ''  ?>&to_date=<?php echo isset($_GET['to_date']) ? $_GET['to_date'] : ''  ?>" ><i class="mdi mdi-file-pdf"></i> Party Report</a>
                                      
                                        <ul class="nav nav-tabs nav-bordered mb-3">
                                            
                                        </ul> <!-- end nav-->
                                      
                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="buttons-table-preview">
                                            <div class="table-responsive">
                                                <table class="table mb-0">
                                                        <thead>
                                                        <tr>
                                                        
                                                            <th>Date</th>
                                                            <th>Party Name</th>
                                                            <th>Truck No.</th>
                                                            <th>Destionation</th>
                                                            <th>Fright</th>
                                                            
                                                            <th>Balance</th>
                                                            <th>Trips Status</th>
                                                            <th>View</th>
                                                           
                                                            
                                                        </tr>
                                                    </thead>
                                                
                                                
                                                   <tbody>
                                                   @php
                                                    $total_partyBalance=0;
                                                    $total_freight=0;
                                                    $total_adv=0;
                                                    $total_charges=0;
                                                    $total_payment=0;
                                                    $total_supplierBalance=0;
                                                    $partyBalance = 0;
                                                   @endphp
                                                   @foreach($records as $row)
                                                   @php

                                                    $partyFreightAmount = $row->partyFreightAmount;
                                                    $diesel_adv_transport = $row->diesel_adv_transport;
                                                    $driver_cash_transport = $row->driver_cash_transport;
                                                    $unload_rate_per = $row->unload_rate_per;
                                                    $unload_unit_per = $row->unload_unit_per;
                                                    $shortage_qty = $row->shortage_qty;
                                                    $shortage_amount = $row->shortage_amount;
                                                    $extra_diesel_amout = $row->extra_diesel_amout;
                                                    $builty_commission = $row->builty_commission;
                                                    $unload_weight_per = $row->unload_weight_per;
                                                   $partyName = AdminController::getValueStatic2('parties','partyName','id',$row->partyName);
                                                 
                                                   $vehicleNumber = AdminController::getValueStatic2('vehicles','vehicleNumber','id',$row->vehicleNumber);
                                                   
                                                   $ownership = AdminController::getValueStatic2('vehicles','ownership','id',$row->vehicleNumber);
                                                   
                                                   $origin = AdminController::getValueStatic2('routes','name','id',$row->origin);
                                                   
                                                   $destination = AdminController::getValueStatic2('routes','name','id',$row->destination);
                                                   $partyBalance= AddShortController::partyBalance($row->id);
                                                   $supplierBalance= AddShortController::supplierBalance($row->id);
                                                  
                                                   $short_amount = isset($unload_weight_per) ? $partyFreightAmount - $unload_rate_per*$unload_weight_per : 0;

                                                   $partyFreightAmount = $row->partyFreightAmount;
                                                    $totalChargesAdd =AddShortController::sumfucntion('party_charges','trip_id','chargesAmount',$row->id,'billtype',1);
                                                    $totalChargesDection =AddShortController::sumfucntion('party_charges','trip_id','chargesAmount',$row->id,'billtype',2);
                                                    $totalPartyAdvance = AddShortController::sumfucntion2('party_advances','trip_id','amount',$row->id);
                                                    $totalPartypayment = AddShortController::sumfucntion2('party_payments','trip_id','amount',$row->id);
                                                    $partyBalance += $partyFreightAmount - $short_amount- $shortage_amount  -$diesel_adv_transport -$builty_commission - $driver_cash_transport + $totalChargesAdd - $totalChargesDection - $totalPartyAdvance - $totalPartypayment ;
  

                                                @endphp
                                                        
                                                        @php
                                                        $total_partyBalance += $partyBalance;
                                                    $total_freight+=$partyFreightAmount;
                                                    $total_adv+=$totalPartyAdvance;
                                                    $total_payment+=$totalPartypayment;
                                                    $total_charges+=$totalChargesAdd - $totalChargesDection;
                                                    $total_supplierBalance+=$supplierBalance;
                                                     @endphp
                                                        <tr>
                                                            <td>{{ date('d-m-Y',strtotime($row->startDate)) }}</td>
                                                            <td>{{ $partyName }}</td>
                                                         
                                                            <td>{{ isset($vehicleNumber) ? $vehicleNumber : ''  }} <span style="color:blue;">( {{ isset($ownership) ? $ownership : ''  }} )</span></td>
                                                            <td>{{ isset($origin) ? $origin : '' }} => {{ isset($destination) ? $destination : '' }}  </td>
                                                            <td>₹ {{ $partyFreightAmount }}</td>
                                                            
                                                            <td> ₹ {{ isset($partyBalance) ? round($partyBalance) : '0' }}</td>
                                                        
                                                            <td> <span class="btn btn-success" > 
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
                                                         </span></td>
                                                             <td><a href="{{ route('trips.show',$row->id) }}"><span class="btn btn-primary" > View </span></a></td>
                                                        </tr>
                                                            
                                                      
                                                    @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                    <th colspan="4" style="text-align:right">Total</th>
                                                    <th>₹ {{ round($total_freight) }}</th>
                                                    <th>₹ {{ round($total_adv) }}</th>
                                                    <th>₹ {{ round($total_charges) }}</th>
                                                    <th>₹ {{ round($total_payment) }}</th>
                                                    <th>{{ round($total_partyBalance) }}</th>
                                                    <th id="payamount"></th>
                                                    <th id="payamount"></th>
                                                    
                                                    </tfoot>
                                                </table>                                           
                                            </div> <!-- end preview-->
                                        
                                                </div> <!-- end preview-->
                                        </div> <!-- end tab-content-->
                                   
                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->
                        </div>
                        <!-- end row-->

  </div>     
  
  
  <script>
  
  function totalSum(value){

    var payamount = $("#payamountHiden").val();
   if(payamount==''){
    payamount=0;  
   }

    var total = parseInt(payamount)+parseInt(value);

    $("#payamountHiden").val(total);
    $("#payamount").html(total);

  }
  function fetchAType($id=0){
     $.ajax({
            type:'GET',
            url:'{{ url("common-get-select2") }}?table=parties&id=id&column=partyName',
            success:function(response){
                console.log(response);
                $(".advanceType").html(response);
                $(".advanceType").val(<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>);
                $('.advanceType').trigger('change'); 
            }
            });
    };

    fetchAType();
  </script>  

@endsection