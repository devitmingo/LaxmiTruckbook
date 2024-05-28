<?php 
   use App\Http\Controllers\AdminController;
   use App\Http\Controllers\AddShortController;
   use Illuminate\Http\Request;
   $paymentBal =  AddShortController::partyBalance($data->id);
   $ownership='';
  if(isset($data->vehicleNumber)){
   $ownership = AdminController::getValueStatic2('vehicles','ownership','id',$data->vehicleNumber);
  }
  use App\Models\BillingType;

        $party_rate_per = $data->party_rate_per;
        $party_unit_per = $data->party_unit_per;
        $billingType = BillingType::where('id',$data->billingType)->first();

        $partyFreightAmount = $data->partyFreightAmount;
        $diesel_adv_transport = $data->diesel_adv_transport;
        $driver_cash_transport = $data->driver_cash_transport;
        $unload_rate_per = $data->unload_rate_per;
        $unload_unit_per = $data->unload_unit_per;
        $shortage_qty = $data->shortage_qty;
        $shortage_amount = $data->shortage_amount;
        $extra_diesel_amout = $data->extra_diesel_amout;
        $builty_commission = $data->builty_commission;
        $unload_weight_per = $data->unload_weight_per;
        $short_amount = isset($unload_weight_per) ? $partyFreightAmount - $unload_rate_per*$unload_weight_per : 0;
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
      </style>
      <!-- <div id="background">
         <p id="bg-text">{{ $com->company_name }}</p> 
         	</div> -->
      <div >
    
         <table style="width: 100%" style="border:1px solid black">
            <thead>
               <tr>
                  <th colspan="20" style="padding-left:  0px!important; font-size: 16px;">
                     <center>Invoice</center>
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
                    <th colspan="10" >Trip Reports</th>
                    <th colspan="10" style=" text-align: right; ">Generated on {{ date('d-m-Y H:i:s') }}</th>
                </tr>

                <tr >
                    <th colspan="10" rowspan="3" style="border: 0.5px solid black">Bill To <br> {{ AdminController::getValueStatic2('parties','partyName','id',$data->partyName) }}</th>
                    <th colspan="5" style=" border-bottom: 0.5px solid black; border-left: 0.5px solid black" >{{ AdminController::getValueStatic2('routes','name','id',$data->origin) }} <br><span> {{ date('d-m-Y',strtotime($data->startDate)) }} </span></th>
                    <th colspan="1" style=" border-bottom: 0.5px solid black" >To</th>
                    <th colspan="4" style=" border-bottom: 0.5px solid black" >{{ AdminController::getValueStatic2('routes','name','id',$data->destination) }}</th>
                    

                </tr>
                <tr>
                  <th colspan="10" style=" border: 0.5px solid black" > Truck No. : {{ AdminController::getValueStatic2('vehicles','vehicleNumber','id',$data->vehicleNumber) }}</th>
                  </tr>
                  @if($ownership != "Market Truck")
                  <tr>
                     <th colspan="10" style=" border: 0.5px solid black" > Driver Name : {{ AdminController::getValueStatic2('drivers','driverName','id',$data->supplierName) }}</th>
                  </tr>
                  @endif
                 
                <tr style="background:black;color:white;">
                  <th colspan="20" style=" border: 0.5px solid black" > Material  Details </th>
                </tr>
                <tr style="background:#ccc;">
                  <th colspan="2" >SN</th>
                  <th colspan="6"  >LR No</th>
                  <th colspan="12" >Material</th>
                </tr>

                <?php
                  $material_records =  AdminController::getRecords('l_r_lists','trip_id',$data->id);
                   ?>
                   @foreach($material_records as $tc)
                  <tr>
                      <th colspan="2">{{ $loop->index+1 }}</th>
                      <th colspan="6">{{ $tc->lr_no }}</th>
                      <th colspan="12">{{ $tc->material }}</th>
                  </tr>
                  @endforeach

            </thead>
         </table>

         <table style="width: 100%" style="border:1px solid black">
            <thead>
               <tr style="background:black;color:white;">
                  <th colspan="20" style=" border-bottom: 0.5px solid black">
                     <b>Bill Details</b>
                  </th>
               </tr>
            </thead>
            <tbody>
               <tr>
                  <th colspan="14" style=" border: 0.5px solid black;padding-left:4px;">
                        Loading 
                        ({{ $party_rate_per }} x {{ $party_unit_per }} {{ $billingType->name }} )
                  </th>
                  <th colspan="6" style=" border: 0.5px solid black; text-align:right; padding-right:4px;">
                        {{ number_format($party_rate_per * $party_unit_per,2) }}
                  </th>
               </tr>

               <tr>
                  <th colspan="14" style=" border: 0.5px solid black;padding-left:4px;">
                     Unloading 
                        ({{ $unload_rate_per }} x {{ $unload_weight_per }} {{ $billingType->name }} )
                  </th>
                  <th colspan="6" style=" border: 0.5px solid black; text-align:right; padding-right:4px;">
                        {{ number_format($unload_rate_per * $unload_weight_per,2) }}
                  </th>
               </tr>
               <tr>
                  <th colspan="14" style=" border: 0.5px solid black;padding-left:4px;">
                        Freight Amount
                  </th>
                  <th colspan="6" style=" border: 0.5px solid black; text-align:right; padding-right:4px;">
                        {{ number_format($partyFreightAmount-$short_amount,2) }}
                  </th>
               </tr>
               <tr>
                  <th colspan="14" style=" border: 0.5px solid black;padding-left:4px;">
                   Driver Cash 
                  </th>
                  <th colspan="6" style=" border: 0.5px solid black; text-align:right; padding-right:4px;">
                        {{ number_format($driver_cash_transport,2) }}
                  </th>
               </tr>
               <tr>
                  <th colspan="14" style=" border: 0.5px solid black;padding-left:4px;">
                  Shortage Amount
                  </th>
                  <th colspan="6" style=" border: 0.5px solid black; text-align:right; padding-right:4px;">
                        {{ number_format($shortage_amount,2) }}
                  </th>
               </tr>
               <tr>
                  <th colspan="14" style=" border: 0.5px solid black;padding-left:4px;">
                  Builty Commission
                  </th>
                  <th colspan="6" style=" border: 0.5px solid black; text-align:right; padding-right:4px;">
                        {{ number_format($builty_commission,2) }}
                  </th>
               </tr>
               <?php
                  $partyAdvances =  AdminController::getRecords('party_advances','trip_id',$data->id);
               ?>
                  @if(!$partyAdvances->isEmpty())
               <tr>
                  <th colspan="20" style=" border: 0.5px solid black;padding-left:4px;">
                       Advances(-)
                  </th>
               </tr>
             
               @foreach ($partyAdvances as $advx) 
               <tr>
               <th colspan="8" style=" border: 0.5px solid black;padding-left:4px; text-align:center;">
                 Via  {{ AdminController::getValueStatic2('advance_types','name','id',$advx->advanceType)  }}
                  </th>
                  <th colspan="6" style=" border: 0.5px solid black;padding-left:4px; text-align:center;">

                  On {{ date('d-m-Y',strtotime($advx->paymentDate)) }}
                  </th>
                  <th colspan="6" style=" border: 0.5px solid black; text-align:right; padding-right:4px;">
                        {{ number_format($advx->amount,2) }}
                  </th>
               </tr>
               @endforeach
               @endif
              
               <?php
                  $chargeAdds =  AdminController::getRecords2('party_charges','trip_id',$data->id,'billType',1);
               ?>
               @if(!$chargeAdds->isEmpty())
               <tr>
               <th colspan="20" style=" border: 0.5px solid black;padding-left:4px;">
                       Charges(+)
                  </th>
               </tr>
               
              
                @foreach ($chargeAdds as $chags)
                  <tr>
                  <th colspan="8" style=" border: 0.5px solid black;padding-left:4px; text-align:center;">
                  Via  {{ AdminController::getValueStatic2('advance_types','name','id',$chags->chargesType)  }}
                     </th>
                     <th colspan="6" style=" border: 0.5px solid black;padding-left:4px; text-align:center;">

                     On {{ date('d-m-Y',strtotime($chags->chargesDate)) }}
                     </th>
                     <th colspan="6" style=" border: 0.5px solid black; text-align:right; padding-right:4px;">
                           {{ number_format($chags->chargesAmount,2) }}
                     </th>
                  </tr>
                @endforeach
               @endif
               
               <?php
                  $chargeAdds =  AdminController::getRecords2('party_charges','trip_id',$data->id,'billType',2);
               ?>
               @if(!$chargeAdds->isEmpty())
                  <tr>
                  <th colspan="20" style=" border: 0.5px solid black;padding-left:4px;">
                        Deductions(-)
                     </th>
                  </tr>
              
                @foreach ($chargeAdds as $chags)
               <tr>
               <th colspan="8" style=" border: 0.5px solid black;padding-left:4px; text-align:center;">
                 Via  {{ AdminController::getValueStatic2('advance_types','name','id',$chags->chargesType)  }}
                  </th>
                  <th colspan="6" style=" border: 0.5px solid black;padding-left:4px; text-align:center;">

                  On {{ date('d-m-Y',strtotime($chags->chargesDate)) }}
                  </th>
                  <th colspan="6" style=" border: 0.5px solid black; text-align:right; padding-right:4px;">
                        {{ number_format($chags->chargesAmount,2) }}
                  </th>
               </tr>
               @endforeach
               @endif
               <?php
                  $payadds =  AdminController::getRecords('party_payments','trip_id',$data->id);
               ?>
               @if(!$payadds->isEmpty())
               <tr>
                  <th colspan="20" style=" border: 0.5px solid black;padding-left:4px;">
                       Payments(-)
                  </th>
               </tr>
              
                @foreach ($payadds as $payadd)
               <tr>
               <th colspan="8" style=" border: 0.5px solid black;padding-left:4px; text-align:center;">
                 Via  {{ AdminController::getValueStatic2('advance_types','name','id',$payadd->advanceType)  }}
                  </th>
                  <th colspan="6" style=" border: 0.5px solid black;padding-left:4px; text-align:center;">

                  On {{ date('d-m-Y',strtotime($payadd->paymentDate)) }}
                  </th>
                  <th colspan="6" style=" border: 0.5px solid black; text-align:right; padding-right:4px;">
                        {{ number_format($payadd->amount,2) }}
                  </th>
               </tr>
               @endforeach
               @endif
              
               <tr>
                  <th colspan="14" style=" border: 0.5px solid black;padding-left:4px;">
                  Total Pending Balance 
                  </th>

                  <th colspan="6" style=" border: 0.5px solid black;padding-left:4px;text-align:right;">
                  {{   number_format($paymentBal,2) }}
                  </th>
               </tr>
            </tbody>
         </table>


        
      </div>
   </body>
</html>