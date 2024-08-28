@extends('layouts.app')
@section('body')
   <!-- Start Content-->
  <div class="container-fluid">

  <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Add Trip</h4>  
                                </div>
                                </div>
                        </div>     
                        <!-- end page title --> 

                <div class="row">
                            <div class="col-12">
                            <x-alert/>
                                <div class="card">
                                    <div class="card-body">
                                 
                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="form-row-preview">
                                                 @if(isset($data))
                                                <form action="{{ route('trips.update',$data->id) }}" method="post" autocomplete="off">
                                                @method('PATCH')
                                                @else
                                                <form action="{{ route('trips.store') }}" method="post" autocomplete="off">
                                                @endif
                                                    @csrf
                                                    <div class="row g-2">
                                                        <h4> Trip Details</h4>
                                                        <div class="mb-2 col-md-2">
                                                            <label for="inputEmail4" class="form-label">Select Party *
                                                            <a href="#"><i class="mdi mdi-plus-box" style="font-size:20px;" onclick="Addparty()"></i></a>
                                                             </label>
                                                             <select id="partyName" name="partyName" class="form-select js-example-basic-single">
                                                               
                                                            </select>
                                                         </div>
                                                        <div class="mb-2 col-md-2">
                                                            <label for="inputPassword4" class="form-label">Select Truck No.* 
                                                            <a href="#"><i class="mdi mdi-plus-box" style="font-size:20px;" onclick="AddVehicle()"></i></a>
                                                            </label>
                                                             <select id="vehicleNumber" onchange="onVehiclechange()" name="vehicleNumber" class="form-select js-example-basic-single">
                                                               
                                                            </select>
                                                            <script>document.getElementById("vehicleNumber").value = "{{ old('vehicleNumber',isset($data->vehicleNumber) ? $data->vehicleNumber : '' )}}"; </script>
                                                        </div>


                                                        <div class="mb-2 col-md-2" id="optionData">
                                                        </div>

                                                        
                                                        <div class="mb-3 col-md-3"> 
                                                            <label for="inputEmail4" class="form-label" style="margin-bottom: 0px;">Select Origin*</label> <a href="#"><i class="mdi mdi-plus-box" style="font-size:20px;" onclick="AddRoute()"></i></a>
                                                             <select id="origin" name="origin" class="form-select js-example-basic-single routes">
                                                                
                                                            </select>
                                                            <script>document.getElementById("origin").value = "{{ old('origin',isset($data->origin) ? $data->origin : '' )}}"; </script>
                                                        </div>
                                                        <div class="mb-3 col-md-3">
                                                            <label for="inputPassword4" class="form-label">Select Destination*</label>
                                                             <select id="destination" name="destination" class="form-select js-example-basic-single routes">
                                                                
                                                            </select>
                                                            <script>document.getElementById("destination").value = "{{ old('destination',isset($data->destination) ? $data->destination : '' )}}"; </script>
                                                    </div>


                                                      
                                                    


                                                    <hr>

                                                    <div class="row">
                                                        <div class="row col-md-6">
                                                            
                                                            <h4>Billing Information</h4>
                                                                <div class="col-md-3">
                                                                    <label for="inputEmail4" class="form-label">Party Billing Type *</label>
                                                                    <select id="billingType" name="billingType" onchange="onPartyBillingTypechange()" class="form-select js-example-basic-single partybillType">
                                                                        
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label for="inputPassword4" class="form-label">Rate  <span id="title_rate_per"></span></label>
                                                                    <input type="text" name="party_rate_per" onchange="onFreightRatechange()" class="form-control" id="party_rate_per" value="{{ old('party_rate_per',isset($data->party_rate_per) ? $data->party_rate_per : '' )  }}">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label for="inputPassword4" class="form-label">Weight <span id="total_units"></span></label>
                                                                    <input type="text" name="party_unit_per" onchange="onFreightRatechange()" class="form-control" id="party_unit_per" value="{{ old('party_unit_per',isset($data->party_unit_per) ? $data->party_unit_per : '' )  }}">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label for="inputPassword4" class="form-label">Freight Amount*</label>
                                                                    <input type="text" name="partyFreightAmount"  class="form-control" id="partyFreightAmount" value="{{ old('partyFreightAmount',isset($data->partyFreightAmount) ? $data->partyFreightAmount : '' )  }}">
                                                                </div>
                                                            
                                                            <span style="display:none">
                                                                <div class="col-md-3" >
                                                                        <label for="inputEmail4" class="form-label">Supplier Billing Type *</label>
                                                                        <select id="supplierBillingType" name="supplierBillingType" onchange="onSupplierBillingType()" class="form-select js-example-basic-single supbillType">
                                                                            
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                    <label for="inputPassword4" class="form-label">Rate  <span id="title_rate_per"></span></label>
                                                                    <input type="text" name="truck_rate_per" onchange="onTruckHireAmoutn()" class="form-control" id="truck_rate_per"
                                                                    value="{{ old('truck_rate_per',isset($data->truck_rate_per) ? $data->truck_rate_per : '' )  }}"
                                                                    >
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label for="inputPassword4" class="form-label">Weight <span id="total_units"></span></label>
                                                                    <input type="text" name="truck_unit_per" onchange="onTruckHireAmoutn()" class="form-control" id="truck_unit_per"
                                                                    value="{{ old('truck_unit_per',isset($data->truck_unit_per) ? $data->truck_unit_per : '' )  }}">
                                                                </div>
                                                            </span>
                                                            <br></br>
                                                            <br></br>
                                                            <hr>
                                                            <div class="col-md-4">
                                                                <label for="inputPassword4" class="form-label">Start Date*</label>
                                                                <input type="text" name="startDate"  id="startDate" class="form-control datepicker" id="inputCity" 
                                                                value="{{ old('startDate',isset($data->startDate) ? $data->startDate : date('m-d-Y') )  }}">
                                                            </div>


                                                            <div class="col-md-4">
                                                                <label for="inputPassword4" class="form-label">Start Kms Reading*</label>
                                                                <input type="text" class="form-control" name="startKmsReading" id="startKmsReading"
                                                                value="{{ old('startKmsReading',isset($data->startKmsReading) ? $data->startKmsReading : '' )  }}">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="inputPassword4" class="form-label">Driver Cash from Transport</label>
                                                                <input type="text" class="form-control" name="driver_cash_transport" id="driver_cash_transport"
                                                                value="{{ old('driver_cash_transport',isset($data->driver_cash_transport) ? $data->driver_cash_transport : '' )  }}">
                                                            </div>
                                                        
                                                            <br></br>
                                                            <br></br>
                                                            <hr>
                                                            <div class="col-md-4" style="display:none;">
                                                                <label for="inputPassword4" class="form-label">Diesel Rate</label>
                                                                <input type="text" name="diesel_rate"  id="diesel_rate" onclick="diesal_cal()" class="form-control" 
                                                                value="{{ old('diesel_rate',isset($data->diesel_rate) ? $data->diesel_rate :'' )  }}"
                                                                >
                                                            </div>
                                                            <div class="col-md-4" style="display:none;">
                                                                <label for="inputPassword4" class="form-label">Diesel LTR</label>
                                                                <input type="text" name="diesel_ltr"  id="diesel_ltr" onkeyup="diesal_cal()" class="form-control" 
                                                                value="{{ old('diesel_ltr',isset($data->diesel_ltr) ? $data->diesel_ltr :'' )  }}"
                                                                >
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="inputPassword4" class="form-label">Diesel Advance from Transport</label>
                                                                <input type="text" name="diesel_adv_transport"  id="diesel_adv_transport" class="form-control" 
                                                                value="{{ old('diesel_adv_transport',isset($data->diesel_adv_transport) ? $data->diesel_adv_transport :'' )  }}"
                                                                disabled>
                                                            </div>


                                                            
                                                       
                                                        </div>
                                                        <div class="col-md-6">
                                                            <h4>Material Information</h4>
                                                            <table class="table mb-0">
                                                                <thead class="table-light">
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>LR No</th>
                                                                    <th>Material Name</th>
                                                                    <th>Note</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <td></td> 
                                                                    <td><input type="text" class="form-control" name="lrNo" id="lrNo">
                                                                    <input type="hidden" class="form-control" name="lr_table_id" id="lr_table_id">
                                                                    </td>
                                                                    <td> <input type="text" class="form-control" name="materialName" id="materialName">
                                                                    </td>
                                                                    <td><input type="text" class="form-control" name="note" id="note" placeholder="Add Notes" />
                                                                </td>
                                                                <td>
                                                                
                                                                <button type="button" class="btn btn-primary" onclick="save_material();">Add</button>
                                                                </td>
                                                                </tr>
                                                            
                                                                </tbody>
                                                                <tfoot id="material_details">
                                                                </tfoot>
                                                            </table>
                                                                
                                                        </div>
                                                        </div>
                                                        </div>
                                                        
                                                    <button type="submit" class="btn btn-primary" style="float:right;">{{ isset($data) ? "Update" : "Submit" }}</button>
                                                </form>                      
                                            </div> <!-- end preview-->
                                        
                                           
                                        </div> <!-- end tab-content-->

                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>

</div> 

<script>
    function diesal_cal(){
        var diesel_rate = $('#diesel_rate').val();
        var diesel_ltr = $('#diesel_ltr').val();
        var diesel = diesel_rate*diesel_ltr;
        $('#diesel_adv_transport').val(Math.round(diesel));
    }
    diesal_cal();
</script>
@include('admin.tripjs');
@include('admin.tripModel');
@endsection

@section('java_script')





