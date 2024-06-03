<?php 
   use App\Http\Controllers\AdminController;
   use App\Http\Controllers\AddShortController;
   use Illuminate\Http\Request;
  
   ?>
<!DOCTYPE html>
<html>
   <body style="font-family: Courier!important;">
      <style>
         body{
         border: 1px solid black;
         }
         table,td,th {
         border-spacing: -1px;
         font-size: 14px;
         border: 0.5px solid black;
         }
         th{
         padding-left: 26px;
         padding-bottom: 6px;
         padding-top: 6px;
         padding-right:  6px;
         text-align: left; 
         }
         #background{
         position:absolute;
         z-index:0;
         background:white;
         display:block;
         min-height:50%; 
         min-width:50%;
         color:yellow;
         }
         #content{
         position:absolute;
         z-index:1;
         }
         #bg-text
         {
         color:lightgrey;
         font-size:120px;
         transform:rotate(300deg);
         -webkit-transform:rotate(300deg);
         }


         .tableStyle th{
         padding-left: 10px;
         padding-bottom: 6px;
         padding-top: 6px;
         padding-right:  6px;
         text-align: left; 
         }

         .tableStyle td{
         padding-left: 10px;
         padding-bottom: 6px;
         padding-top: 6px;
         padding-right:  6px;
         text-align: left; 
         }
      </style>
      <!-- <div id="background">
         <p id="bg-text">{{ $com->company_name }}</p> 
         	</div> -->
      <div >
    
         <table style="width: 100%" style="border:1px solid black">
            <thead>
               <tr>
                  <th colspan="20" style="padding-left:  0px!important; font-size: 16px;">
                     <center>Reports</center>
                  </th>
               </tr>
               <tr>
                  <th colspan="20" style="padding-left:  0px!important; font-size: 28px;">
                     <center>{{ $com->name }}<br><span style="font-size: 14px;">{{ $com->address }}</span></center>
                  </th>
               </tr>
               <tr>
                  <th colspan="20" style="padding-left:  10px!important;text-align: center;">Mob. No : {{ $com->mobile }},{{ $com->phone }} </th>
                  </tr>
                  <tr>
                  <th colspan="20" style="padding-right:   10px!important; text-align: center; border-bottom: 0.5px solid black">Email :  {{ $com->email }} @if($com->gst_no) || <span style = "margin-right:110px;">GST No.  :    {{ $com->gst_no }} @endif </span> </th>
                  </tr>

                <tr style="background:black;color:white;">
                    <th colspan="10" >Trips Reports</th>
                    <th colspan="10" style=" text-align: right; ">Generated on {{ date('d-m-Y H:i:s') }}</th>
                </tr>

               
            </thead>
         </table>

         <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <ul class="nav nav-tabs nav-bordered mb-3">
                                            
                                        </ul> <!-- end nav-->
                                        <div class="tab-content" id="myTable">
                                            <div class="tab-pane show active" id="buttons-table-preview">
                                                <table  id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100 tableStyle">
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

                                                  $loadig_weight = isset($row->party_unit_per) ? $row->party_unit_per : $truck_rate_per ;
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
                                                            <td>{{ isset($material) ? $material : '' }} (Material)<hr>
                                                                (Loading) {{ isset($rate) ? $rate : '' }} x {{ isset($loadig_weight) ? $loadig_weight : '' }} = {{ $rate*$loadig_weight }}  <hr>
                                                                (Unloading) {{ isset($rate) ? $rate : '' }} x {{ isset($unloading_weight) ? $unloading_weight : '' }} = {{ $rate*$unloading_weight }}</br>
                                                        </td>
                                                            <td>{{ isset($shortage_amount) ? number_format($shortage_amount,2) : ''  }}</td>
                                                            
                                                            <td>Diesel  - {{ isset($diesel_adv_transport) ? number_format($diesel_adv_transport,2) : ''  }} </br><span style="font-size:11px;">({{isset($row->diesel_rate) ? $row->diesel_rate : '' }} x {{isset($row->diesel_ltr) ? $row->diesel_ltr."Ltr": '' }}) </span> <hr>
                                                            Driver Cash - {{ isset($driver_cash_transport) ? number_format($driver_cash_transport,2) : ''  }} <hr>
                                                            Builty Commission {{ isset($builty_commission) ? number_format($builty_commission,2) : ''  }}
                                                        </td>
                                                            
                                                            <td>Extra Diesel  = {{ isset($extra_diesel_amout) ? number_format($extra_diesel_amout,2) : ''  }} </br>
                                                            <span style="font-size:11px;">({{isset($row->extra_diesel_rate) ? $row->extra_diesel_rate : '' }} x {{isset($row->extra_diesel_ltr) ? $row->extra_diesel_ltr."Ltr": '' }})</span>
                                                            <hr>
                                                            Extra Expenses {{ isset($extra_expenses) ? number_format($extra_expenses,2) : ''  }}<hr>
                                                            Toll Amount - {{ isset($toll_amount) ? number_format($toll_amount,2) : ''  }}</td>
                                                            <td>{{ isset($partyBalance) ? number_format($partyBalance,2) : ''  }}</td>
                                                            <td>{{ isset($total_saving) ? number_format($total_saving,2) : ''  }}</td>
                                                           
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
   </body>
</html>