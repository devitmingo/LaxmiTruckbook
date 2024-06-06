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
                    <th colspan="10" >Truck Profit  Reports</th>
                    <th colspan="10" style=" text-align: right; ">Generated on {{ date('d-m-Y H:i:s') }}</th>
                </tr>

               
            </thead>
         </table>
         @if(isset($records))
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="tab-content">
                                         <div class="tab-pane show active" id="buttons-table-preview">
                                            
                                            <div class="table-responsive">
                                                <table class="table mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Truck No.</th>
                                                            <th>Total Trip Profit</th>
                                                            <th>Total Tyre Exp.</th>
                                                            <th>Total Ureafilling Exp.</th>
                                                            <th>Total Maintenance exp.</th>
                                                            <th>Net Profit</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($records as $row)
                                                            
                                                                <tr>
                                                                    <td>{{ $loop->index+1 }}</td>
                                                                    <td>{{ isset($row->vehicleNumber) ? $row->vehicleNumber : "0" }}</td>
                                                                    <td>{{ isset($row->total_truck_profit) ? $row->total_truck_profit : "0" }}</td>
                                                                    <td>{{ isset($row->total_tyre_amount) ? $row->total_tyre_amount : "0" }}</td>
                                                                    <td>{{ isset($row->total_urearefilling_amount) ? $row->total_urearefilling_amount : "0" }}</td>
                                                                    <td>{{ isset($row->total_maintenanceForm_amount) ? $row->total_maintenanceForm_amount : "0" }}</td>
                                                                    <th>{{ isset($row->net_profit) ? $row->net_profit : "0" }}</th>
                                                                </tr>
                                                           

                                                        @endforeach
                                                    </tbody>
                                                   
                                                </table>    
                                                </div> <!-- end preview-->  
                                                                      
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