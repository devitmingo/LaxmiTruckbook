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
         padding-left: 10px;
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
                    <th colspan="10" >Maintenance Reports</th>
                    <th colspan="10" style=" text-align: right; ">Generated on {{ date('d-m-Y H:i:s') }}</th>
                </tr>

               
            </thead>
         </table>

                        <div class="row">
                            <x-alert/>
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="buttons-table-preview">
                                                <table  class="table table-striped dt-responsive nowrap w-100">
                                                    <thead>
                                                        <tr>
                                                            <th>SN</th>
                                                            <th>Date</th>
                                                            <th>Vehicle Number<hr>
                                                            Maintenance Name</th>
                                                            <th>Meter Reading<hr>
                                                            Driver Name</th>
                                                           
                                                            <th>Product Type<hr>
                                                            Shop Name</th>
                                                            <th>Place</th>
                                                            
                                                            <th>Self/Warranty</th>
                                                            <th>Amount<hr>
                                                            Payment Type</th>
                                                            <th>Staff</th>
                                                            <th>Vendor Name</th>
                                                            <th>Notes</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                
                                                
                                                   <tbody>
                                                        @foreach($records as $row)
                                                        @php
                                                        
                                                        $vehicleNumber = AdminController::getValueStatic2('vehicles','vehicleNumber','id',$row->vehicleNumber);
                                                        $driverName = AdminController::getValueStatic2('drivers','driverName','id',$row->driverName);
                                                        $maintenances = AdminController::getValueStatic2('maintenances','name','id',$row->maintenance);
                                                        if($row->vendorName!=''){
                                                            $vendorName = AdminController::getValueStatic2('vendors','vendorName','id',$row->vendorName);
                                                        }else{
                                                            $vendorName = '';
                                                        }
                                                        @endphp
                                                        <tr>
                                                            <td>{{ $loop->index+1 }}</td>
                                                            <td>{{ date('d-m-Y',strtotime($row->date))}}</td>
                                                            <td>{{ isset($vehicleNumber) ? $vehicleNumber : '' }}<hr>
                                                            {{ isset($maintenances) ? $maintenances : '' }}</td>
                                                            <td>{{ isset($row->meterReading) ? $row->meterReading : '' }}<hr>
                                                            {{ isset($driverName) ? $driverName : '' }}</td>
                                                            <td>{{ isset($row->productType) ? $row->productType : '' }}<hr>
                                                            {{ isset($row->shop_name) ? $row->shop_name : '' }}</td>
                                                            <td>{{ isset($row->place) ? $row->place : '' }}</td>
                                                            <td>{{ isset($row->self_warranty) ? $row->self_warranty : '' }}</td>
                                                            <td>{{ isset($row->amount) ? "₹".number_format($row->amount,2) : '' }}<hr>{{ isset($row->paymentType) ? $row->paymentType : '' }}</td>
                                                            <td>{{ isset($row->staff) ? $row->staff : '' }}</td>
                                                            <td>{{ isset($vendorName) ? $vendorName : '' }}</td>
                                                            <td>{{ isset($row->notes) ? $row->notes : '' }}</td>
                                                            
                                                             <td>
                                                             <a href="{{route('maintenanceForm.edit',$row->id)}}" class="btn btn-success" rel="tooltip" title="Edit">
                                                                    <i class="mdi mdi-square-edit-outline"></i>
                                                                </a>
                                                                <a href="#" class="btn" onclick="return confirm('Are you sure ? Do you want to Delete?')" rel="tooltip" title="Delete">
                                                                
                                                                <form action="{{route('maintenanceForm.destroy',$row->id)}}" method="post">
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
   </body>
</html>