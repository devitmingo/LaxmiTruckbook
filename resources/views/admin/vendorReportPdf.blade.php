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
                    <th colspan="10" >Transaction Report  Reports</th>
                    <th colspan="10" style=" text-align: right; ">Generated on {{ date('d-m-Y H:i:s') }}</th>
                </tr>

               
            </thead>
         </table>

         @if(isset($records))
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                       
                                        <ul class="nav nav-tabs nav-bordered mb-3">
                                            
                                        </ul> <!-- end nav-->
                                        <div class="tab-content" id="myTable">
                                            <div class="tab-pane show active" id="buttons-table-preview">
                                                <table  id="datatable-buttons" width="100%" class="table table-striped dt-responsive nowrap w-100">
                                                    <thead>
                                                        <tr>
                                                            <th>Date</th>
                                                            <th>Maintenance/Vendor Name</th>
                                                            <th>Description</th>
                                                            <th>Cr Amount</th>
                                                            <th>Dr Amount</th>
                                                            <th>Balance</th>
                                                        </tr>
                                                        <tr>
                                                            <th colspan="4" style="text-align:right;">Opening Bal</th>
                                                            <th>{{ isset($openingBalance) ? number_format($openingBalance,2) : '' }}</th>
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
                                                        if($row->page==8){
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
                                                    @endphp


                                                        <tr>
                                                        <td>{{ date('d-m-Y',strtotime($row->date)) }} </td>
                                                        <td> {{ isset($vehicle) ? $vehicle : ''  }}</td>
                                                        <td> {{ isset($type) ? $type : ''  }}</td>
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
   </body>
</html>