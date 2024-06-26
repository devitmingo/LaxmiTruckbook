@extends('layouts.app')
@section('body')
   <!-- Start Content-->
  <div class="container-fluid">

  <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Add Transaction </h4>  
                                </div>
                                </div>
                        </div>     
                        <!-- end page title --> 
                        <div class="row">
                            <div class="col-12">
                                  <x-alert/>
                                <div class="card">
                                    <div class="card-body">
                               
                                 <a href="{{ route('trans.index') }}"><button  type="button" class="btn btn-primary right"><i class="mdi mdi-format-list-bulleted"></i> Show Transaction </button></a>
                                        <br>
                                        </br>
                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="form-row-preview">

                                                @if(isset($data))
                                                <form action="{{ route('trans.update',$data->id) }}" method="post" autocomplete="off">
                                                @method('PATCH')
                                                @else
                                                <form action="{{ route('trans.store') }}" method="post" autocomplete="off">
                                                @endif
                                                    @csrf
                                                    <div class="row g-2">
                                                        
                                                        <div class="mb-3 col-md-3">
                                                            <label for="inputPassword4" class="form-label">Type<span class="imp">*</span></label>
                                                            <select id="trans_type" name="trans_type" onchange="onType();" class="form-select js-example-basic-single">
                                                                <option>--Choose Type--</option>
                                                                <option value="Vendor">Vendor Payment</option>
                                                                <option value="Expenses" >Expenses</option>
                                                                <option value="Income">Income</option>
                                                            </select>
                                                                                                                   
                                                            </select>
                                                            <script>document.getElementById("trans_type").value = "{{ old('trans_type',isset($data->trans_type) ? $data->trans_type : '' )}}"; </script>
                                                         </div>

                                                        <div class="mb-3 col-md-3" id="head">
                                                            <label for="inputPassword4" class="form-label" style="margin-bottom: 0px;">Head Type<span class="imp">*</span><a href="#"><i class="mdi mdi-plus-box" style="font-size:20px;" onclick="AddHead()"></i></a></label>
                                                            <select id="head_type"  name="head_type" class="form-select js-example-basic-single">
                                                            
                                                            </select>
                                                            <script>document.getElementById("head_type").value = "{{ old('head_type',isset($data->head_type) ? $data->head_type : '' )}}"; </script>
                                                        </div>

                                                        <div class="mb-3 col-md-3" id="ven" style="display:none">
                                                            <label for="inputPassword4" class="form-label">Vendor Name <span class="imp">*</span></label>
                                                            <select id="vendor_name"  name="vendor_name" class="form-select js-example-basic-single" onchange="getVendorBal();">
                                                                <option>--Choose Type--</option>   
                                                                @foreach($vendor as $row)
                                                                    <option value="{{ $row->id }}">{{ $row->vendorName }}</option>
                                                                @endforeach
                                                            </select>
                                                            <script>document.getElementById("vendor_name").value = "{{ old('vendor_name',isset($data->head_type) ? $data->head_type : '' )}}"; </script>
                                                        </div>

                                                        <div class="mb-3 col-md-3">
                                                            <label for="inputPassword4" class="form-label">Pay Type <span class="imp">*</span><a href="#"><i class="mdi mdi-plus-box" style="font-size:20px;" onclick="addpaymentTypeModel()"></i></a></label>
                                                             <select id="pay_type"  name="pay_type" class="form-select js-example-basic-single fetchPaymentType">
                                                             <option>--Choose Pay Type--</option>
                                                                @foreach($pay_types as $pay)
                                                                    <option value="{{ $pay->id }}" >{{ $pay->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            <script>document.getElementById("pay_type").value = "{{ old('pay_type',isset($data->pay_type) ? $data->pay_type : '' )}}"; </script>
                                                        </div>


                                                        <div class="mb-3 col-md-3">
                                                             <label for="inputPassword4" class="form-label">Amount <span class="imp">*</span> </label>
                                                             <input type="number" class="form-control" name="amount" id="amount"
                                                             value="{{ old('amount',isset($data->amount) ? $data->amount : '' )}}">
                                                             <span id="venBalHtml" style="color:red;"></span>
                                                        </div>

                                                        <div class="mb-3 col-md-3">
                                                             <label for="inputPassword4" class="form-label">Date <span class="imp">*</span></label>
                                                             <input type="text" class="form-control datepicker" name="trans_date" id="trans_date"
                                                             value="{{ old('trans_date',isset($data->trans_date) ? $data->trans_date : '' )}}">
                                                        </div>

                                                        <div class="mb-3 col-md-3">
                                                             <label for="inputPassword4" class="form-label">Notes</label>
                                                             <input type="text" class="form-control" name="notes" id="notes"
                                                             value="{{ old('notes',isset($data->notes) ? $data->notes : '' )}}">
                                                        </div>

                                                        
                                                         <div class="mb-3 col-md-3">
                                                         </br>   
                                                            <button type="submit" class="btn btn-success"><span class="mdi mdi-content-save-all"></span> {{ isset($data) ? "Update" : "Submit" }}</button>
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
function AddHead(){
    $("#addHeadModel").modal('show');
}

</script>

<!--Add Party Modal -->
<div class="modal fade" id="addHeadModel" tabindex="-1" role="dialog" aria-labelledby="addPartyModel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addHeadModel">Add Party</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body px-4 pb-4 pt-0">
                                                <div class="row">
                                                <div class="col-12">
                                                        <div class="mb-3">
                                                            <label class="control-label form-label">Head Name</label>
                                                            <input class="form-control" placeholder="Head Name" type="text" name="name" id="mname"  />

                                                           
                                                           </div>
                                                    </div>

    
                                                  
                                                </div>
                                                <div class="row">
                                                <div class="col-6 text-end"></div>
                                                    <div class="col-6 text-end">
                                                        <button type="button" class="btn btn-light me-1" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-success" id="btn-save-event" onclick="Saveheads()">Save</button>
                                                    </div>
                                                </div>
                                            </div>
    </div>
  </div>
</div>

<script>
//Start SaveParty
function Saveheads() {

var name = $("#mname").val();


var status=true;

if (name == '') {
    status=false;
    alert('Please  Name');
}



if(status == true){
$.ajax({
    type: 'GET',
    url: '{{ route("addShort") }}?name='+name+'&page=addHead',
    success: function(response) {
        //console.log(response);
        $("#mname").val('');
       
        $("#addHeadModel").modal('hide');
        fetchHead();
    }
});
}
}

//end SaveParty
function fetchHead(id=0){
  
  $.ajax({
  type:'GET',
  url:'{{ url("common-get-select2") }}?table=heads&id=id&column=name',
  success:function(response){
    //   console.log(response);
    //   alert(response);
      $("#head_type").html(response);
      $("#head_type").val(id);
      $('#head_type').trigger('change'); 
      document.getElementById("partyName").value = "<?php echo isset($data->partyName) ? $data->partyName : '' ?>";

  }
  });
}   
//onload rung party function
fetchHead();

function onType(){
    var type =$('#trans_type').val();
    if(type == 'Vendor'){
            $('#ven').show();
            $('#head').hide();
    }else{
        $('#ven').hide();
        $('#head').show();
    }
}
onType();

function getVendorBal(){
   var vendor_name  = $('#vendor_name').val();
   $.ajax({
  type:'GET',
  url:'{{ url("/admin/get-ven-bal") }}?vendor_name='+vendor_name,
  success:function(response){
    $('#venBalHtml').html("Vendor Credit Balance :"+response);
  }
  });
}
</script>
@include('admin.mastermodel');
@endsection