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
                    <th colspan="10" >Transaction Report</th>
                    <th colspan="10" style=" text-align: right; ">Generated on {{ date('d-m-Y H:i:s') }}</th>
                </tr>

               
            </thead>
         </table>

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        
                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="buttons-table-preview">
                                                <table style="width:100%" class="table table-striped dt-responsive nowrap w-100">
                                                    <thead>
                                                        <tr>
                                                            <th>SN</th>
                                                            <th>Transaction Type</th>
                                                            <th>Head/Vendor Name</th>
                                                            <th>Pay Type</th>
                                                            <th>Amount</th>
                                                            <th>Date</th>
                                                            <th>Notes</th>
                                                        </tr>
                                                    </thead>
                                                
                                                
                                                   <tbody>
                                                        @foreach($records as $row)
                                                        @php
                                                         $pay_type = AdminController::getValueStatic2('advance_types','name','id',$row->pay_type);
                                                         if($row->trans_type == 'Vendor'){
                                                            $head_type = AdminController::getValueStatic2('vendors','vendorName','id',$row->head_type);
                                                         }else{
                                                            $head_type = AdminController::getValueStatic2('heads','name','id',$row->head_type);
                                                         }
                                                        @endphp
                                                        <tr>
                                                            <td>{{ $loop->index+1 }}</td>
                                                            <td>{{ $row->trans_type }}</td>
                                                            <td>{{ $head_type }}</td>
                                                            <td>{{ $pay_type  }}</td>
                                                            <td>{{ $row->amount }}</td>
                                                            <td>{{ date('d-m-Y',strtotime($row->trans_date)) }}</td>
                                                            <td>{{ $row->notes }}</td>
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