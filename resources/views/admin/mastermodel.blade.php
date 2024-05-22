<script>
        function addpaymentTypeModel(){
             $("#addpaymentTypeModel").modal('show');
        }
</script>
<div class="modal fade m-5" id="addpaymentTypeModel" tabindex="-1" role="dialog" aria-labelledby="addpaymentTypeModel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addpaymentTypeModel">Add Payment Type</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body px-4 pb-4 pt-0">
            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <label class="control-label form-label">Name</label>
                        <input class="form-control" placeholder="Name" type="text" name="pay_x_name" id="pay_x_name" required />
                                                            
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6 text-end"></div>
                <div class="col-6 text-end">
                    <button type="button" class="btn btn-light me-1" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" id="btn-save-event" onClick="AddPaymentType()">Save</button>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
<script>
     function AddPaymentType(){
            event.preventDefault();
            var name = $("#pay_x_name").val();
            if(name==''){
                alert('Please Fill Charge Name');
            }
        
            
            $.ajax({
            url:'{{ route("addShort") }}?page=xAddPaymentType&name='+name,
            type:'GET',
            enctype: 'multipart/form-data', 
            contentType: false,
            processData: false,
            cache:false,
            success:function(response){
                console.log(response);
                fetchPaymentType();
                $("#pay_x_name").val('');
                $("#addpaymentTypeModel").modal('hide');
            },
            error: function(response) {
                console.log(response);
            }
            });
        

          }


    function fetchPaymentType($id=0){
        $.ajax({
                type:'GET',
                url:'{{ url("common-get-select2") }}?table=payment_types&id=id&column=name',
                success:function(response){
                    //console.log(response);
                    $(".fetchPaymentType").html(response);
                    $(".fetchPaymentType").val(id);
                    $('.fetchPaymentType').trigger('change'); 
                }
                });
        };

        fetchPaymentType();
</script>
