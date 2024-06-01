@extends('layouts.app')
@section('body')
   <!-- Start Content-->
  <div class="container-fluid">

  <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Maintenance</h4>  
                                </div>
                                </div>
                        </div>     
                        <!-- end page title --> 
                        <div class="row">
                            <div class="col-12">
                                   <x-alert/>
                                <div class="card">
                                    <div class="card-body">

                              
                                  <a href="{{ route('maintenanceForm.index') }}"><button  type="button" class="btn btn-primary right">Maintenance Report</button></a>
                                        <br>
                                        </br>


                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="form-row-preview">

                                                @if(isset($data))
                                                <form action="{{ route('maintenanceForm.update',$data->id) }}" method="post" autocomplete="off">
                                                @method('PATCH')
                                                @else
                                                <form action="{{ route('maintenanceForm.store') }}" method="post" autocomplete="off">
                                                @endif
                                                    @csrf
                                                    <div class="row g-2">
                                                        
                                                        <div class="mb-3 col-md-3">
                                                             <label for="inputPassword4" class="form-label">Date <span class="imp">*</span></label>
                                                             <input type="text" class="form-control datepicker" name="date" id="date" value="{{ old('date',isset($data->date) ? $data->date : '' )}}">
                                                        </div>
                                                        <div class="mb-3 col-md-3">
                                                             <label for="inputPassword4" class="form-label">Maintenance Type <span class="imp">*</span></label>
                                                             <select id="maintenance" name="maintenance" class="form-select js-example-basic-single">
                                                                <option>--Choose Maintenance--</option>
                                                                @foreach($maintenance as $row)
                                                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                                                                @endforeach                                                           
                                                            </select>
                                                            <script>document.getElementById("maintenance").value = "{{ old('maintenance',isset($data->maintenance) ? $data->maintenance : '' )}}"; </script>
                                                        </div>

                                                        <div class="mb-3 col-md-3">
                                                             <label for="inputPassword4" class="form-label">Vehicle Number <span class="imp">*</span></label>
                                                             <select id="vehicleNumber" name="vehicleNumber" class="form-select js-example-basic-single">
                                                                <option>--Choose Vehicle--</option>
                                                                @foreach($vehicle as $row)
                                                                <option value="{{ $row->id }}">{{ $row->vehicleNumber }}</option>
                                                                @endforeach                                                           
                                                            </select>
                                                            <script>document.getElementById("vehicleNumber").value = "{{ old('vehicleNumber',isset($data->vehicleNumber) ? $data->vehicleNumber : '' )}}"; </script>
                                                        </div>

                                                        <div class="mb-3 col-md-3">
                                                             <label for="inputPassword4" class="form-label">Driver Name <span class="imp">*</span></label>
                                                             <select id="driverName" name="driverName" class="form-select js-example-basic-single">
                                                                <option>--Choose Supplier--</option>
                                                                @foreach($driver as $row)
                                                                <option value="{{ $row->id }}">{{ $row->driverName }}</option>
                                                                @endforeach                                                           
                                                            </select>
                                                            <script>document.getElementById("driverName").value = "{{ old('driverName',isset($data->driverName) ? $data->driverName : '' )}}"; </script>
                                                        </div>

                                                        
                                                        <div class="mb-3 col-md-3">
                                                             <label for="inputPassword4" class="form-label">Meter Reading <span class="imp">*</span></label>
                                                             <input type="text" class="form-control" name="meterReading" id="meterReading" value="{{ old('meterReading',isset($data->meterReading) ? $data->meterReading : '' )}}">
                                                        </div>
                                                        <div class="mb-3 col-md-3">
                                                             <label for="inputPassword4" class="form-label">Product Type <span class="imp">*</span></label>
                                                             <select id="productType" name="productType" class="form-select js-example-basic-single">
                                                                <option>--Choose Supplier--</option>
                                                                <option value="New">New</option>
                                                                <option value="Old">Old</option>             
                                                            </select>
                                                            <script>document.getElementById("productType").value = "{{ old('productType',isset($data->productType) ? $data->productType : '' )}}"; </script>
                                                        </div>
                                                        <div class="mb-3 col-md-3">
                                                             <label for="inputPassword4" class="form-label">Shop Name<span class="imp">*</span></label>
                                                             <input type="text" class="form-control" name="shop_name" id="shop_name" value="{{ old('shop_name',isset($data->shop_name) ? $data->shop_name : '' )}}">
                                                        </div>
                                                        <div class="mb-3 col-md-3">
                                                             <label for="inputPassword4" class="form-label">Place</label>
                                                             <input type="text" class="form-control" name="place" id="place" value="{{ old('place',isset($data->place) ? $data->place : '' )}}">
                                                        </div>
                                                        <div class="mb-3 col-md-3">
                                                             <label for="inputPassword4" class="form-label">Staff</label>
                                                             <input type="text" class="form-control" name="staff" id="staff" value="{{ old('staff',isset($data->staff) ? $data->staff : '' )}}">
                                                        </div>
                                                        <div class="mb-3 col-md-3">
                                                            <label for="inputPassword4" class="form-label" on>Self/Warranty Type<span class="imp">*</span></label>
                                                            <select id="self_warranty" class="form-select" name="self_warranty" onchange="SlefWrrantyOnchange()">
                                                                <option value="">-Select-</option>
                                                                <option value="self">Self</option>
                                                                <option value="Warranty">Warranty</option>
                                                            </select>
                                                            <script>document.getElementById("self_warranty").value = "{{ old('self_warranty',isset($data->self_warranty) ? $data->self_warranty : '' )}}"; </script>
                                                        </div>
                                                        <div class="mb-3 col-md-3">
                                                             <label for="inputPassword4" class="form-label">Amount<span class="imp">*</span></label>
                                                             <input type="number" class="form-control" name="amount" id="amount" value="{{ old('amount',isset($data->amount) ? $data->amount : '' )}}">
                                                        </div>
                                                        <div class="mb-3 col-md-3">
                                                            <label for="inputPassword4" class="form-label" on>Payment Type</label>
                                                            <select id="paymentType" class="form-select" name="paymentType" onchange="paymentOnchange()">
                                                                <option value="">-Select-</option>
                                                                <option value="cash">Cash</option>
                                                                <option value="credit">Credit</option>
                                                               
                                                            </select>
                                                            <script>document.getElementById("paymentType").value = "{{ old('paymentType',isset($data->paymentType) ? $data->paymentType : '' )}}"; </script>
                                                        </div>

                                                        <div class="mb-3 col-md-3" id="vendor_div">
                                                            <label for="inputPassword4" class="form-label">Vendor Name<span class="imp">*</span></label>
                                                            <select id="vendorName" class="form-select js-example-basic-single" name="vendorName">
                                                                <option value="">-Select-</option>
                                                                    @foreach($supp as $row)
                                                                        <option value="{{ $row->id }}">{{ $row->vendorName }}</option>
                                                                    @endforeach
                                                            </select>
                                                            <script>document.getElementById("vendorName").value = "{{ old('vendorName',isset($data->vendorName) ? $data->vendorName : '' )}}"; </script>
                                                        </div>

                                                        <div class="mb-6 col-md-6">
                                                             <label for="inputPassword4" class="form-label">Notes</label>
                                                             <input type="text" class="form-control" name="notes" id="notes" value="{{ old('notes',isset($data->notes) ? $data->notes : '' )}}">
                                                        </div>
                                                         <div class="mb-3 col-md-3">
                                                         </br>   
                                                            <button type="submit" class="btn btn-primary">{{ isset($data) ? "Update" : "Submit" }}</button>
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

<script>
    function paymentOnchange(){
        $('#vendor_div').hide();
        var pay =$('#paymentType').val();
                if(pay=='credit'){
                    $('#vendor_div').show();
                }else{
                    $('#vendor_div').hide();
                }
    }
    paymentOnchange();

    function SlefWrrantyOnchange(){
        var self_warranty = $('#self_warranty').val();
        if(self_warranty=='Warranty'){
            $('#amount').val('0');
            $('#amount').attr('disabled','disabled');
        }else{
            $('#amount').val('');
            $('#amount').removeAttr('disabled');
        }

    }
</script>
@endsection