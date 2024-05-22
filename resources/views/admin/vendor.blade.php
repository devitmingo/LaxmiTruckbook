@extends('layouts.app')
@section('body')
   <!-- Start Content-->
  <div class="container-fluid">

  <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Add Vendor</h4>  
                                </div>
                                </div>
                        </div>     
                        <!-- end page title --> 
                        <div class="row">
                            <div class="col-12">
                                  <x-alert/>
                                <div class="card">
                                    <div class="card-body">
                               
                                 <a href="{{ route('vendor.index') }}"><button  type="button" class="btn btn-primary right"> Show Vendor </button></a>
                                        <br>
                                        </br>
                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="form-row-preview">

                                                @if(isset($data))
                                                <form action="{{ route('vendor.update',$data->id) }}" method="post">
                                                @method('PATCH')
                                                @else
                                                <form action="{{ route('vendor.store') }}" method="post">
                                                @endif
                                                    @csrf
                                                    <div class="row g-2">
                                                        
                                                        <div class="mb-3 col-md-3">
                                                           
                                                             <label for="inputPassword4" class="form-label">Vendor Name</label>
                                                             <input type="text" class="form-control" name="vendorName" id="inputCity" value="{{ old('vendorName',isset($data->vendorName) ? $data->vendorName : '' )}}">
                                                        
                                                        </div>
                                                        <div class="mb-3 col-md-3">
                                                             <label for="inputPassword4" class="form-label">Mobile</label>
                                                             <input type="number" class="form-control" name="mobile" id="mobile"
                                                             value="{{ old('mobile',isset($data->mobile) ? $data->mobile : '' )}}"
                                                             
                                                             >
                                                        </div>
                                                        <div class="mb-3 col-md-3">
                                                             <label for="inputPassword4" class="form-label">Mobile 2</label>
                                                             <input type="number" class="form-control" name="mobile2" id="mobile2"
                                                             value="{{ old('mobile2',isset($data->mobile2) ? $data->mobile2 : '' )}}"
                                                             
                                                             >
                                                        </div>

                                                        <div class="mb-3 col-md-3">
                                                             <label for="inputPassword4" class="form-label">Address</label>
                                                             <input type="test" class="form-control" name="address" id="address"
                                                             value="{{ old('address',isset($data->address) ? $data->address : '' )}}"
                                                             
                                                             >
                                                        </div>

                                                        <div class="mb-3 col-md-3">
                                                             <label for="inputPassword4" class="form-label">Status</label>
                                                             <select id="status" name="status" class="form-select js-example-basic-single">
                                                                <option>--Choose Status--</option>
                                                                 <option value="0">Disable</option>
                                                                 <option value="1">Enable</option>
                                                                                                                   
                                                            </select>
                                                            <script>document.getElementById("status").value = "{{ old('status',isset($data->status) ? $data->status : '1' )}}"; </script>
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
@endsection