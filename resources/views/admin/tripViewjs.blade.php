<script>

//Open expensesModel 
    function expensesModel(){
        $("#expensesModel").modal('show');
    }

    

    function AddExpenses(){
        $("#expensesAdd").modal('show');
    }
    function supplierChargeModel(){
        $("#supplierChargeModel").modal('show');
    }

    function partyChargeModel(){
        $("#partyChargeModel").modal('show');
    }

    function partyAdvanceModel(){
        $("#partyAdvanceModel").modal('show');
    }

    function supplierAdvanceModel(){
        $("#supplierAdvanceModel").modal('show');
    }


    function addAdvanceTypeModel(){
        $("#addAdvanceTypeModel").modal('show');
    }

    function partyPaymentModel(){
        $("#partyPaymentModel").modal('show');
    }

    function supplierPaymentModel(){
        $("#supplierPaymentModel").modal('show');
    }
    
    
    function onComplete(){
        var trip_id = $("#trip_id").val();
        $.ajax({
        type:'GET',
        url:'{{ url("get-single-row-value") }}?table=trips&key=id&value='+trip_id,
        success:function(response){
           
            $("#endDate").val(response.endDate);
            $("#unload_weight_per").val(response.unload_weight_per);
            $("#total_receive").val(response.total_receive);
            $("#shortage_qty").val(response.shortage_qty);
            $("#shortage_amount").val(response.shortage_amount);
            $("#extra_diesel_amout").val(response.extra_diesel_amout);
            $("#endKmsReading").val(response.endKmsReading);
            $("#builty_commission").val(response.builty_commission);
            $("#toll_amount").val(response.toll_amount);
            $("#extra_expenses").val(response.extra_expenses);
            $("#onCompleteModel").modal('show');
        }
        });

        
    }
    function fetchPartyBillingType(id=0){

    $.ajax({
    type:'GET',
    url:'{{ url("common-get-select2") }}?table=billing_types&id=id&column=name',
    success:function(response){
        //alert(response);
        $(".partybillType1").html(response);
        $(".partybillType1").val(<?php echo $data->billingType; ?>);
        $('.partybillType1').trigger('change'); 
    }
    });
    }   
    //onload run party
    fetchPartyBillingType();

      
    function onFreightRatechange(){
    var rate = $("#unload_rate_per").val();
    var qty = $("#unload_weight_per").val();
    var load_qty = $("#load_weight").val();
    var total = rate*qty;

     $("#total_receive").val(total);
        if(qty!=''){
            short_weight=load_qty-qty;
            $("#shortage_qty").val(short_weight);
        }

    }
</script>  

<script>
    function SaveComplete(){
        var endDate = $("#endDate").val();
        var endKmsReading = $("#endKmsReading").val();
        var trip_id = $("#trip_id").val();
        var unload_rate_per = $("#unload_rate_per").val();
        var unload_weight_per = $("#unload_weight_per").val();
        var total_receive = $("#total_receive").val();
        var shortage_qty = $("#shortage_qty").val();
        var shortage_amount = $("#shortage_amount").val();
        var extra_diesel_amout = $("#extra_diesel_amout").val();
        var builty_commission = $("#builty_commission").val();
        var toll_amount = $("#toll_amount").val();
        var extra_expenses = $("#extra_expenses").val();
        var extra_diesel_ltr = $("#extra_diesel_ltr").val();
        var extra_diesel_rate = $("#extra_diesel_rate").val();

        
        var status =true;
        if(endDate==''){
            status =false;
            alert('Please fill End Date');
        }
        
        if(status==true){
        $.ajax({
            type:'GET',
            url:'{{ route("addShort") }}?page=SaveComplete&endDate='+endDate+'&endKmsReading='+endKmsReading+'&trip_id='+trip_id+
            '&unload_rate_per='+unload_rate_per+'&unload_weight_per='+unload_weight_per+'&total_receive='+total_receive+'&shortage_qty='+shortage_qty+
            '&shortage_amount='+shortage_amount+'&extra_diesel_amout='+extra_diesel_amout
            +'&builty_commission='+builty_commission+'&toll_amount='+toll_amount
            +'&extra_expenses='+extra_expenses+'&extra_diesel_ltr='+extra_diesel_ltr+'&extra_diesel_rate='+extra_diesel_rate,
            success:function(response){
                fetchReports();
            
            $("#endDate").val('');
            $("#endKmsReading").val('');
            $("#onCompleteModel").modal('hide');
            location.reload();
          }
            });
        }
    }
    </script>
    
//save POD 



<script>

    function onPODReceive(){
        var trip_id = $("#trip_id").val();
        $.ajax({
        type:'GET',
        url:'{{ url("get-single-row-value") }}?table=trips&key=id&value='+trip_id,
        success:function(response){
           
            $("#pod_receuve_date").val(response.pod_receuve_date);
            $("#onPODReceive").modal('show');

        }
        });
    }
</script>  




<script type="text/javascript">
    
    $('#SavePODReceive').on('submit', function(event){
        event.preventDefault();
        var pod_receuve_date = $("#pod_receuve_date").val();
        var pod_receuve_doc = $("#pod_receuve_doc").val();
        var status =true;
        if(pod_receuve_date==''){
             status =false;
            alert('Please fill pod_receuve_date');
        }
        

        let formData = new FormData(this);
      
        if(status ==true){
        
            $.ajax({
            url: "{{ route('addPODReceive') }}",
            type: "POST",
            enctype: 'multipart/form-data', 

            // data: $(this).serialize(),
            data:  formData,
            contentType: false,
           processData: false,
           cache:false,
            success:function(response){
                console.log(response);
                $("#pod_receuve_date").val('');
                $("#pod_receuve_doc").val('');
                $("#onPODReceive").modal('hide');
                location.reload();
            },
            error: function(response) {
                console.log(response);
            }
            });
        }
    
    });



    </script>
    

    //save onComplete 
<script>

    function onPODSubmit(){
        var trip_id = $("#trip_id").val();
        $.ajax({
        type:'GET',
        url:'{{ url("get-single-row-value") }}?table=trips&key=id&value='+trip_id,
        success:function(response){
       
        $("#pod_submitted_date").val(response.pod_submitted_date);
        $("#onPODsubmit").modal('show');
        }
        });
    }
</script>  




<script type="text/javascript">
    
    function SavePODSubmit(){
        var pod_submitted_date = $("#pod_submitted_date").val();
        var trip_id = $("#trip_id").val();
        
        var status =true;
        if(pod_submitted_date==''){
            status =false;
            alert('Please fill POD Submitted Date');
        }
        
        if(status ==true){
        $.ajax({
            type:'GET',
            url:'{{ route("addShort") }}?page=SavePODSubmit&pod_submitted_date='+pod_submitted_date+'&trip_id='+trip_id,
            success:function(response){
                fetchReports();
            
            $("#pod_submitted_date").val('');
            $("#onPODsubmit").modal('hide');
            location.reload();
          }
            });
        }
    }
    </script>
<script>
    function extra_diesal_cal(){
        var diesel_rate = $('#extra_diesel_rate').val();
        var diesel_ltr = $('#extra_diesel_ltr').val();
        var diesel = diesel_rate*diesel_ltr;
        $('#extra_diesel_amout').val(diesel);
    }
</script>