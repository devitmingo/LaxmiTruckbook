
@extends('layouts.app')
@section('body')
   <!-- Start Content-->
  <div class="container-fluid">

  <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Add Vehicle Type</h4>  
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
                                                <form action="{{ route('urea.update',$data->id) }}" method="post">
                                                @method('PATCH')
                                                @else
                                                <form action="{{ route('urea.store') }}" method="post">
                                                @endif
                                                    @csrf
                                                    <div class="row g-2">
                                                        
                                                        <div class="mb-3 col-md-3">
                                                            <label for="inputPassword4" class="form-label">Vehicle Number</label>
                                                            <select id="vehicle_id" class="form-select js-example-basic-single" name="vehicle_id">
                                                                <option value="">-Select-</option>
                                                                @foreach($vehicle as $row)
                                                                    <option value="{{ $row->id }}">{{ $row->vehicleNumber }}</option>
                                                                @endforeach
                                                            </select>
                                                            <script>document.getElementById("vehicle_id").value = "{{ old('vehicle_id',isset($data->vehicle_id) ? $data->vehicle_id : '' )}}"; </script>
                                                        </div>
                                                        <div class="mb-3 col-md-3">
                                                            <label for="inputPassword4" class="form-label">Driver Name</label>
                                                            <select id="driver_id" class="form-select js-example-basic-single" name="driver_id">
                                                                <option value="">-Select-</option>
                                                                @foreach($driver as $row)
                                                                    <option value="{{ $row->id }}">{{ $row->driverName  }} {{ $row->mobile  }}</option>
                                                                @endforeach
                                                            </select>
                                                            <script>document.getElementById("driver_id").value = "{{ old('driver_id',isset($data->driver_id) ? $data->driver_id : '' )}}"; </script>
                                                        </div>
                                                        <div class="mb-3 col-md-3">
                                                            <label for="inputPassword4" class="form-label">Place</label>
                                                            <input type="text" class="form-control" name="place" id="place" value="{{ old('place',isset($data->place) ? $data->place : '' )}}">
                                                        </div>

                                                        <div class="mb-3 col-md-3">
                                                            <label for="inputPassword4" class="form-label">Meter Reading</label>
                                                            <input type="text" class="form-control" name="meter_reading" id="meter_reading" value="{{ old('meter_reading',isset($data->meter_reading) ? $data->meter_reading : '' )}}">
                                                        </div>

                                                        <div class="mb-3 col-md-3">
                                                            <label for="inputPassword4" class="form-label">Refilling Date</label>
                                                            <input type="text" class="form-control datepicker" name="refilling_date" id="refilling_date" value="{{ old('refilling_date',isset($data->refilling_date) ? $data->refilling_date : '' )}}">
                                                        </div>

                                                        <div class="mb-3 col-md-3">
                                                            <label for="inputPassword4" class="form-label">Liter</label>
                                                            <input type="text" class="form-control" name="liter" id="liter" value="{{ old('liter',isset($data->liter) ? $data->liter : '' )}}">
                                                        </div>
                                                        <div class="mb-3 col-md-3">
                                                            <label for="inputPassword4" class="form-label" on>Self/Warranty Type</label>
                                                            <select id="self_warranty" class="form-select" name="self_warranty" onchange="SlefWrrantyOnchange()">
                                                                <option value="">-Select-</option>
                                                                <option value="self">Self</option>
                                                                <option value="Warranty">Warranty</option>
                                                            </select>
                                                            <script>document.getElementById("self_warranty").value = "{{ old('self_warranty',isset($data->self_warranty) ? $data->self_warranty : '' )}}"; </script>
                                                        </div>
                                                        <div class="mb-3 col-md-3">
                                                            <label for="inputPassword4" class="form-label">Amount</label>
                                                            <input type="text" class="form-control" name="amount" id="amount" value="{{ old('amount',isset($data->amount) ? $data->amount : '' )}}">
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
                                                            <label for="inputPassword4" class="form-label">Vendor Name</label>
                                                            <select id="vendorName" class="form-select js-example-basic-single" name="vendorName">
                                                                <option value="">-Select-</option>
                                                                    @foreach($supp as $row)
                                                                        <option value="{{ $row->id }}">{{ $row->supplierName }}</option>
                                                                    @endforeach
                                                            </select>
                                                            <script>document.getElementById("vendorName").value = "{{ old('vendorName',isset($data->vendorName) ? $data->vendorName : '' )}}"; </script>
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
