@extends('layouts.app')
@section('body')
   <!-- Start Content-->
  <div class="container-fluid">

  <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Murga Busing</h4>  
                                </div>
                                </div>
                        </div>     
                        <!-- end page title --> 
                        <div class="row">
                            <div class="col-12">
                                   <x-alert/>
                                <div class="card">
                                    <div class="card-body">

                              
                                  <a href="{{ route('murgaBusing.index') }}"><button  type="button" class="btn btn-primary right">Murga Busing Report</button></a>
                                        <br>
                                        </br>


                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="form-row-preview">

                                                @if(isset($data))
                                                <form action="{{ route('murgaBusing.update',$data->id) }}" method="post">
                                                @method('PATCH')
                                                @else
                                                <form action="{{ route('murgaBusing.store') }}" method="post">
                                                @endif
                                                    @csrf
                                                    <div class="row g-2">
                                                        
                                                        <div class="mb-3 col-md-3">
                                                             <label for="inputPassword4" class="form-label">Date</label>
                                                             <input type="date" class="form-control" name="date" id="date" value="{{ old('date',isset($data->date) ? $data->date : '' )}}">
                                                        </div>

                                                        <div class="mb-3 col-md-3">
                                                             <label for="inputPassword4" class="form-label">Vehicle Number</label>
                                                             <select id="vehicleNumber" name="vehicleNumber" class="form-select js-example-basic-single">
                                                                <option>--Choose Supplier--</option>
                                                                @foreach($vehicle as $row)
                                                                <option value="{{ $row->id }}">{{ $row->vehicleNumber }}</option>
                                                                @endforeach                                                           
                                                            </select>
                                                            <script>document.getElementById("vehicleNumber").value = "{{ old('vehicleNumber',isset($data->vehicleNumber) ? $data->vehicleNumber : '' )}}"; </script>
                                                        </div>

                                                        <div class="mb-3 col-md-3">
                                                             <label for="inputPassword4" class="form-label">Driver Name</label>
                                                             <select id="driverName" name="driverName" class="form-select js-example-basic-single">
                                                                <option>--Choose Supplier--</option>
                                                                @foreach($driver as $row)
                                                                <option value="{{ $row->id }}">{{ $row->driverName }}</option>
                                                                @endforeach                                                           
                                                            </select>
                                                            <script>document.getElementById("driverName").value = "{{ old('driverName',isset($data->driverName) ? $data->driverName : '' )}}"; </script>
                                                        </div>

                                                      
                                                        <div class="mb-3 col-md-3">
                                                             <label for="inputPassword4" class="form-label">Meter Reading</label>
                                                             <input type="text" class="form-control" name="meterReading" id="meterReading" value="{{ old('meterReading',isset($data->meterReading) ? $data->meterReading : '' )}}">
                                                        </div>

                                                       
                                                        
                                                        <div class="mb-3 col-md-3">
                                                             <label for="inputPassword4" class="form-label">Shop Name</label>
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
</script>
@endsection