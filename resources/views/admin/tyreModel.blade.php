<!-- Modal -->
<div class="modal fade m-5" id="tyreEntry" tabindex="-1" role="dialog" aria-labelledby="tyreEntry" aria-hidden="true">
  <div class="modal-dialog" role="document" style="margin-left: 550px!important;">
    <div class="modal-content" style="width:150%;">
      <div class="modal-header">
        <h5 class="modal-title" id="tyreEntry">Vehical Number : <span class="vehical"></span> || Tyre Type: <span class="tyre_ty"></span></h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form id="TyreTypeSubmit" enctype="multipart/form-data" > 
             @csrf
                <div class="modal-body px-4 pb-4 pt-0">
                                                <div class="row">
                                                
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label class="control-label form-label">Serial Number</label>
                                                            <input class="form-control" placeholder="Serial Number" type="text" name="serial_number" id="serial_number" required />
                                                            <input type="hidden" name="vechicle_id" id="vechicle_id" required />
                                                            <input type="hidden" name="vechicle_number" id="vechicle_number" required /> 
                                                            <input type="hidden" name="tyre_type" id="tyre_type" required /> 
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label class="control-label form-label">Tyre Company Name</label>
                                                            <input class="form-control" placeholder="Tyre Company Name" type="text" name="tyre_company_name" id="tyre_company_name" required />
                                                            
                                                        </div>
                                                    </div>

                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label class="control-label form-label">Meter Reading</label>
                                                            <input class="form-control" placeholder="Meter Reading" type="text" name="meter_reading" id="meter_reading" required />
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label class="control-label form-label">Upload Date</label>
                                                            <input class="form-control datepicker" placeholder="Upload Date" type="text" name="upload_date" id="upload_date" required />
                                                            
                                                        </div>
                                                    </div>

                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label class="control-label form-label">Amount</label>
                                                            <input class="form-control" placeholder="Amount" type="text" name="amount" id="amount" required />
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 col-md-3">
                                                            <label for="inputPassword4" class="form-label" on>Payment Type <span class="imp">*</span></label>
                                                            <select id="paymentType" class="form-select" name="paymentType" onchange="paymentOnchange()">
                                                                <option value="">-Select-</option>
                                                                <option value="cash">Cash</option>
                                                                <option value="credit">Credit</option>
                                                               
                                                            </select>
                                                            <script>document.getElementById("paymentType").value = "{{ old('paymentType',isset($data->paymentType) ? $data->paymentType : '' )}}"; </script>
                                                        </div>

                                                        <div class="mb-3 col-md-3" id="vendor_div">
                                                            <label for="inputPassword4" class="form-label">Vendor Name <span class="imp">*</span></label>
                                                            <select id="vendor_name" class="form-select js-example-basic-single" name="vendor_name">
                                                                <option value="">-Select-</option>
                                                                    @foreach($vendor as $row)
                                                                        <option value="{{ $row->id }}">{{ $row->vendorName }}</option>
                                                                    @endforeach
                                                            </select>
                                                            <script>document.getElementById("vendor_name").value = "{{ old('vendor_name',isset($data->vendor_name) ? $data->vendor_name : '' )}}"; </script>
                                                        </div>

                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label class="control-label form-label">Tyre Model</label>
                                                            <input class="form-control" placeholder="Tyre Model" type="text" name="tyre_model" id="tyre_model"  />
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label class="control-label form-label">Tyre New Image</label>
                                                            <input class="form-control" placeholder="Tyre New Image" type="file" name="new_tyre_image" id="new_tyre_image"  />
                                                            
                                                        </div>
                                                    </div>

                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label class="control-label form-label">Tyre Old Image</label>
                                                            <input class="form-control" placeholder="Tyre Old Image" type="file" name="old_tyre_image" id="old_tyre_image"  />
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label class="control-label form-label">Old Tyre Serial NO</label>
                                                            <input class="form-control" placeholder="Old Tyre Serial NO" type="text" name="old_tyre_serial_number" id="old_tyre_serial_number"  />
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label class="control-label form-label">Old Tyre Company Name</label>
                                                            <input class="form-control" placeholder="Old Tyre Serial NO" type="text" name="old_tyre_company_name" id="old_tyre_company_name"  />
                                                            
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                <div class="col-6 text-end"></div>
                                                    <div class="col-6 text-end">
                                                        <button type="button" class="btn btn-light me-1" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-success" id="btn-save-event">Save</button>
                                                    </div>
                                                </div>
                                            </div>
        </form>
    </div>
  </div>
</div>


<script>
    function onSubmit(){
        var id = $('#vehicleNumber').val();
        $.ajax({
            type:'GET',
            url:'{{ url("get-single-row-value") }}?table=vehicles&value='+id+'&key=id',
            success:function(response){
                $('.vehical').html(response.vehicleNumber)
                $('#vechicle_number').val(response.vehicleNumber);
                $('.vehical_span').html(response.vehicleNumber+" Report")
                $('#vechicle_id').val(response.id);
                $('#vehicle_no').val(response.id);
                $('#table'+response.vehicle_tyre).show();
             }
            });
    }
    function tireOpeningModal(value){
        $(".tyre_ty").html(value);
        $('#tyre_type').val(value);
        $("#tyreEntry").modal('show');  
    }
    $('#TyreTypeSubmit').on('submit', function(event){
        event.preventDefault();
        let formData = new FormData(this);
        $.ajax({
            type:'POST',
            url:'{{ Route("tyre.store") }}',
            enctype: 'multipart/form-data',
            data:  formData,
            contentType: false,
            processData: false,
            cache:false,
            success:function(response){
                alert(response);
                console.log(response);
                $("#tyreEntry").modal('hide');  
                $('#TyreTypeSubmit').trigger("reset");

            },

            error: function(response) {
            }
            });
    });

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