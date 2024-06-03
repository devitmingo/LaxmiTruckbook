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
                    <th colspan="10" >Urea Refilling  Reports</th>
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
   </body>
</html>