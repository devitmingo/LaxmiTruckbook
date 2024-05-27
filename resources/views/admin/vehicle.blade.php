@extends('layouts.app')
@section('body')
   <!-- Start Content-->
  <div class="container-fluid">

  <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Add Vehicle</h4>  
                                </div>
                                </div>
                        </div>     
                        <!-- end page title --> 
                        <div class="row">
                            <div class="col-12">
                                 <x-alert/>
                                <div class="card">
                                    <div class="card-body">
                                
                                  <a href="{{ route('vehicle.index') }}"><button  type="button" class="btn btn-primary right"> Show Vehicle </button></a>
                                        <br>
                                        </br>
                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="form-row-preview">

                                                @if(isset($data))
                                                <form action="{{ route('vehicle.update',$data->id) }}" method="post" enctype="multipart/form-data">
                                                @method('PATCH')
                                                @else
                                                <form action="{{ route('vehicle.store') }}" method="post" enctype="multipart/form-data">
                                                @endif
                                                    @csrf
                                                    <div class="row">
                                                        
                                                        <div class="mb-3 col-md-3">
                                                           
                                                             <label for="inputPassword4" class="form-label">Vehicle Number</label>
                                                             <input type="text" class="form-control" name="vehicleNumber" id="inputCity" value="{{ old('vehicleNumber',isset($data->vehicleNumber) ? $data->vehicleNumber : '' )}}">
                                                        
                                                        </div>
                                                        <div class="mb-3 col-md-3">
                                                             <label for="inputPassword4" class="form-label">Vehicle Type</label>
                                                             <select name="vehicleType" id="vehicleType" class="form-select js-example-basic-single">
                                                                <option>--Choose Vehicle--</option>
                                                                @foreach($vehicleType as $type)
                                                                <option value="{{ $type->id }}">{{ $type->truckName }}</option>
                                                                @endforeach
                                                            </select>

                                                            <script>document.getElementById("vehicleType").value = "{{ old('vehicleType',isset($data->vehicleType) ? $data->vehicleType : '' )}}"; </script>
                                                        </div>

                                                         <div class="mb-3 col-md-3">
                                                             <label for="inputPassword4" class="form-label">OwnerShip</label>
                                                            <select id="ownership" onchange = "getDriver()" name="ownership" class="form-select js-example-basic-single">
                                                                <option value="My Truck" selected="selected">My Truck</option>
                                                                <option value="Market Truck">Market Truck</option>
                                                            
                                                            </select>
                                                            <script>document.getElementById("ownership").value = "{{ old('ownership',isset($data->ownership) ? $data->ownership : '' )}}"; </script>
                                                        </div>


                                                        <div class="mb-3 col-md-3" id="dri_name">
                                                             <label for="inputPassword4" class="form-label">Driver</label>
                                                            <select id="driverName" name="driverName" class="form-select ">
                                                                <option value="">--Choose Driver--</option>
                                                                @foreach($drivers as $driver)
                                                                <option value="{{ $driver->id }}">{{ $driver->driverName }} {{ $driver->mobile }}</option>
                                                                @endforeach                                                      
                                                            </select>

                                                             <script>document.getElementById("driverName").value = "{{ old('driverName',isset($data->driver_id) ? $data->driver_id : '' )}}"; </script>
                                                        </div>

                                                         <div class="mb-3 col-md-3" id="supp_name">
                                                             <label for="inputPassword4" class="form-label">Supplier</label>
                                                            <select id="supplierName" name="supplierName" class="form-select ">
                                                                <option>--Choose Supplier--</option>
                                                                @foreach($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}">{{ $supplier->supplierName }} {{ $supplier->mobile }}</option>
                                                                @endforeach                                                           
                                                            </select>
                                                            <script>document.getElementById("supplierName").value = "{{ old('supplierName',isset($data->supplier_id) ? $data->supplier_id : '' )}}"; </script>
                                                        </div>
                                                     
                                                        <div class="mb-3 col-md-3" id="d_name">
                                                           
                                                             <label for="inputPassword4" class="form-label">Driver Name</label>
                                                             <input type="text" class="form-control" name="driver_name" id="inputCity" value="{{ old('driver_name',isset($data->driver_name) ? $data->driver_name : '' )}}">
                                                        
                                                        </div>
  
                                                        <div class="mb-3 col-md-3" id="d_con">
                                                           
                                                             <label for="inputPassword4" class="form-label">Driver Contact Number</label>
                                                             <input type="text" class="form-control" name="driver_contact" id="inputCity" value="{{ old('driver_contact',isset($data->driver_contact) ? $data->driver_contact : '' )}}">
                                                        
                                                        </div>
                                                        <div class="mb-3 col-md-3">
                                                           
                                                           <label for="inputPassword4" class="form-label">Vehice Tyre No</label>
                                                           <input type="number" class="form-control" name="vehicle_tyre" id="vehicle_tyre" value="{{ old('vehicle_tyre',isset($data->vehicle_tyre) ? $data->vehicle_tyre : '' )}}">
                                                      
                                                         </div>

                                                         <div class="mb-3 col-md-3">
                                                           
                                                           <label for="inputPassword4" class="form-label">Vehice Model</label>
                                                           <input type="text" class="form-control" name="vehicle_model" id="vehicle_model" value="{{ old('vehicle_model',isset($data->vehicle_model) ? $data->vehicle_model : '' )}}">
                                                      
                                                         </div>

                                                         <div class="mb-3 col-md-3">
                                                           
                                                           <label for="inputPassword4" class="form-label">Manufacturer company</label>
                                                           <input type="text" class="form-control" name="manufacturer_company" id="manufacturer_company" value="{{ old('manufacturer_company',isset($data->manufacturer_company) ? $data->manufacturer_company : '' )}}">
                                                      
                                                         </div>

                                                         <div class="mb-3 col-md-3">
                                                           
                                                           <label for="inputPassword4" class="form-label">Chassis No</label>
                                                           <input type="text" class="form-control" name="chassis_no" id="chassis_no" value="{{ old('chassis_no',isset($data->chassis_no) ? $data->chassis_no : '' )}}">
                                                      
                                                         </div>

                                                         <div class="mb-3 col-md-3">
                                                           
                                                           <label for="inputPassword4" class="form-label">Engine No</label>
                                                           <input type="text" class="form-control" name="engine_no" id="engine_no" value="{{ old('engine_no',isset($data->engine_no) ? $data->engine_no : '' )}}">
                                                      
                                                         </div>

                                                         <div class="mb-3 col-md-3">
                                                            <label for="inputPassword4" class="form-label">R C Document</label>
                                                           <input type="file" class="form-control" accept="image/jpeg,image/jpg,image/png,application/pdf" name="r_c_document" id="r_c_document" value="{{ old('r_c_document',isset($data->r_c_document) ? $data->r_c_document : '' )}}">
                                                         </div>
                                                         <div class="mb-3 col-md-3">
                                                            <label for="inputPassword4" class="form-label">RC Expiry Date</label>
                                                           <input type="text" class="form-control datepicker" name="r_c_expiry_date" id="r_c_expiry_date" value="{{ old('r_c_expiry_date',isset($data->r_c_expiry_date) ? $data->r_c_expiry_date : '' )}}">
                                                         </div>
                                                         <div class="mb-3 col-md-3" style="display:none;">
                                                            <label for="inputPassword4" class="form-label">Insurance Start Date</label>
                                                           <input type="text" class="form-control datepicker"  name="insurance_start_date" id="insurance_start_date" value="{{ old('insurance_start_date',isset($data->insurance_start_date) ? $data->insurance_start_date : '' )}}" >
                                                         </div>
                                                         <div class="mb-3 col-md-3">
                                                            <label for="inputPassword4" class="form-label">Insurance Document</label>
                                                           <input type="file" class="form-control" name="insurance_document" id="insurance_document" value="{{ old('insurance_document',isset($data->insurance_document) ? $data->insurance_document : '' )}}" accept="image/jpeg,image/jpg,image/png,application/pdf">
                                                         </div>
                                                         <div class="mb-3 col-md-3">
                                                            <label for="inputPassword4" class="form-label">Insurance Expiry Date</label>
                                                           <input type="text" class="form-control datepicker" name="insurance_expiry_date" id="insurance_expiry_date" value="{{ old('insurance_expiry_date',isset($data->insurance_expiry_date) ? $data->insurance_expiry_date : '' )}}">
                                                         </div>

                                                         <div class="mb-3 col-md-3">
                                                            <label for="inputPassword4" class="form-label">Fitness Document</label>
                                                           <input type="file" class="form-control" name="fitness_document" id="fitness_document" value="{{ old('fitness_document',isset($data->fitness_document) ? $data->fitness_document : '' )}}" accept="image/jpeg,image/jpg,image/png,application/pdf">
                                                         </div>
                                                         <div class="mb-3 col-md-3">
                                                            <label for="inputPassword4" class="form-label">Fitness Expiry Date</label>
                                                           <input type="text" class="form-control datepicker" name="fitness_expiry_date" id="fitness_expiry_date" value="{{ old('fitness_expiry_date',isset($data->fitness_expiry_date) ? $data->fitness_expiry_date : '' )}}">
                                                         </div>

                                                         <div class="mb-3 col-md-3">
                                                            <label for="inputPassword4" class="form-label">Tax Pay Document</label>
                                                           <input type="file" class="form-control" name="tax_pay_document" id="tax_pay_document" value="{{ old('tax_pay_document',isset($data->tax_pay_document) ? $data->tax_pay_document : '' )}}" accept="image/jpeg,image/jpg,image/png,application/pdf">
                                                         </div>

                                                         <div class="mb-3 col-md-3">
                                                            <label for="inputPassword4" class="form-label">Tax Pay Expiry Date</label>
                                                           <input type="text" class="form-control datepicker" name="tax_pay_expiry_date" id="tax_pay_expiry_date" value="{{ old('tax_pay_expiry_date',isset($data->tax_pay_expiry_date) ? $data->tax_pay_expiry_date : '' )}}">
                                                         </div>

                                                         <div class="mb-3 col-md-3">
                                                            <label for="inputPassword4" class="form-label">Permit Document</label>
                                                           <input type="file" class="form-control" name="permit_document" id="permit_document" value="{{ old('permit_document',isset($data->permit_document) ? $data->permit_document : '' )}}"  accept="image/jpeg,image/jpg,image/png,application/pdf">
                                                         </div>

                                                         <div class="mb-3 col-md-3">
                                                            <label for="inputPassword4" class="form-label">Permit Expiry Date</label>
                                                           <input type="text" class="form-control datepicker" name="permit_expiry_date" id="permit_expiry_date" value="{{ old('permit_expiry_date',isset($data->permit_expiry_date) ? $data->permit_expiry_date : '' )}}">
                                                         </div>
                                                         <div class="mb-3 col-md-3">
                                                             <label for="inputPassword4" class="form-label">Status</label>
                                                             <select id="status1" name="status" class="form-select js-example-basic-single">
                                                                <option>--Choose Status--</option>
                                                                 <option value="0">Disable</option>
                                                                 <option value="1">Enable</option>
                                                                                                                   
                                                            </select>
                                                            <script>document.getElementById("status1").value = "{{ old('status',isset($data->status) ? $data->status : '1' )}}"; </script>
                                                        </div>
                                                         <div class="mb-3 col-md-3">
                                                         </br>   
                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                         </div>
                                                    </div>
                                                 </form>                      
                                            </div> <!-- end preview-->
                                        
                                           
                                        </div> <!-- end tab-content-->

                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>

</div>



@endsection

@section('java_script')

<script type="text/javascript">
    
                $("#dri_name").show();
                $("#d_name").hide();
                $("#d_con").hide();
                $("#supp_name").hide();

    function getDriver(){
        var ownership = $("#ownership").val();
       
        if (ownership == 'My Truck') {
                $("#dri_name").show();
                $("#d_name").hide();
                $("#d_con").hide();
                $("#supp_name").hide();
            }else if(ownership == 'Market Truck'){
                $("#dri_name").hide();
                $("#d_name").show();
                $("#d_con").show();
                $("#supp_name").show();
            } else {
                
            }
    }   
                                                               
     
getDriver();

</script>

@endsection