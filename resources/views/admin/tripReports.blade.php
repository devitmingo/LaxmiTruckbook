@php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AddShortController;
$fromDate = isset($fromDate) ? date('d-m-Y',strtotime($fromDate)) : '';
$toDate = isset($toDate) ? date('d-m-Y',strtotime($toDate)) : '';
@endphp
@extends('layouts.app')
@section('body')
<script type="text/javascript">
   $(function() {
     
    $('#from_date').datepicker({ dateFormat: 'dd-mm-yy' }).val();
     $('#to_date').datepicker({ dateFormat: 'dd-mm-yy' }).val();
    });
   
   
</script>
   <!-- Start Content-->
  <div class="container-fluid">

  <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Truck Report</h4>
                                    
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
                                                <input class="form-control datepicker" type="text" name="from_date" id="from_date" value="<?php  echo $fromDate;  ?>" />
                                            </div>

                                            <div class="mb-2 col-md-2">
                                                <input  class="form-control datepicker" type="text" name="to_date" id="to_date" value="<?php echo $toDate; ?>"/>
                                            </div>

                                            <div class="mb-2 col-md-2">
                                                <select class="form-select js-example-basic-single" name="id" id="id" >
                                                    <option value="" >Select</option>
                                                   @foreach($vehicles as $row)
                                                    <option value="{{ $row->id }}" >{{ $row->vehicleNumber }}</option>
                                                   @endforeach 
                                                </select>
                                            </div>
                                            <div class="mb-2 col-md-2">
                                                <button class="btn btn-success"><i class="mdi mdi-account-search"></i>  Search</button>  
                                                <a href="{{ Route('truckReports') }}" class="btn btn-danger"><i class="mdi mdi-refresh"></i> Reset</a>  
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </form>
                            @if(isset($records))
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <ul class="nav nav-tabs nav-bordered mb-3">
                                        <a target="_blank" class="btn btn-warning" href="{{ route('pdfTruckProfitReports') }}?id=<?php echo isset($_GET['id']) ? $_GET['id'] : '';  ?>&from_date=<?php echo isset($_GET['from_date']) ? $_GET['from_date'] : ''  ?>&to_date=<?php echo isset($_GET['to_date']) ? $_GET['to_date'] : ''  ?>" ><i class="mdi mdi-file-pdf"></i> Truck Profit Report</a>
                                            
                                        </ul> <!-- end nav-->
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
                                                            <th>Truck Ledger</th>
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
                                                                    <th><a href="{{ route('truckReportLedger')}}?vehicleNumber={{ $row->id }}&fromDate={{ $fromDate }}&toDate={{ $toDate }}"><span class="btn btn-primary" > <i class="mdi mdi-eye-outline"></i> </span></a></th>
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
           
@endsection