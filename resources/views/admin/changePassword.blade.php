@extends('layouts.app')
@section('body')
   <!-- Start Content-->
  <div class="container-fluid">

  <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Change Password</h4>  
                                </div>
                                </div>
                        </div>     
                        <!-- end page title --> 
                        <div class="row">
                             <x-alert/>
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="form-row-preview">

                                               
                                                <form action="{{ route('changePass') }}" method="post" enctype="multipart/form-data" autocomplete="off">
                                               
                                                    @csrf
                                                    <div class="row g-2">
                                                        
                                                        <div class="mb-3 col-md-3">
                                                           
                                                             <label for="inputPassword4" class="form-label">Old Password <span class="imp">*</span></label>
                                                             <input type="password" class="form-control" name="oldPassword" id="oldPassword" >
                                                        
                                                        </div>
                                                        <div class="mb-3 col-md-3">
                                                             <label for="inputPassword4" class="form-label">New Password <span class="imp">*</span></label>
                                                             <input type="password" class="form-control" name="password" id="password">
                                                        </div>

                                                        <div class="mb-3 col-md-3">
                                                             <label for="inputPassword4" class="form-label">Cofirm Password</label>
                                                             <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
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