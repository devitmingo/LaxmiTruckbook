@extends('layouts.app')
@section('body')
   <!-- Start Content-->
  <div class="container-fluid">

  <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Add Driver</h4>  
                                </div>
                                </div>
                        </div>     
                        <!-- end page title --> 
                        <div class="row">
                             <x-alert/>
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                
                                 <a href="{{ route('driver.index') }}"><button  type="button" class="btn btn-primary right">  Show Driver </button></a>
                                        <br>
                                        </br>
                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="form-row-preview">

                                                @if(isset($data))
                                                <form action="{{ route('driver.update',$data->id) }}" method="post" enctype="multipart/form-data">
                                                @method('PATCH')
                                                @else
                                                <form action="{{ route('driver.store') }}" method="post" enctype="multipart/form-data">
                                                @endif
                                                    @csrf
                                                    <div class="row g-2">
                                                        
                                                        <div class="mb-3 col-md-3">
                                                           
                                                             <label for="inputPassword4" class="form-label">Driver Name</label>
                                                             <input type="text" class="form-control" name="driverName" id="inputCity" value="{{ old('driverName',isset($data->driverName) ? $data->driverName : '' )}}">
                                                        
                                                        </div>
                                                        <div class="mb-3 col-md-3">
                                                             <label for="inputPassword4" class="form-label">Mobile</label>
                                                             <input type="number" class="form-control" name="mobile" id="inputCity"
                                                             value="{{ old('mobile',isset($data->mobile) ? $data->mobile : '' )}}">
                                                        </div>

                                                        <div class="mb-3 col-md-3">
                                                             <label for="inputPassword4" class="form-label">Mobile 2</label>
                                                             <input type="number" class="form-control" name="mobile2" id="inputCity"
                                                             value="{{ old('mobile2',isset($data->mobile2) ? $data->mobile2 : '' )}}">
                                                        </div>

                                                        <div class="mb-3 col-md-3">
                                                             <label for="inputPassword4" class="form-label">Date of Joining</label>
                                                             <input type="text" placeholder="Date of Joining" class="form-control datepicker" name="date_of_joining" id="date_of_joining"
                                                             value="{{ old('date_of_joining',isset($data->date_of_joining) ? $data->date_of_joining : '' )}}">
                                                        </div>

                                                        <div class="mb-3 col-md-3">
                                                             <label for="inputPassword4" class="form-label">Aadhar Number</label>
                                                             <input type="number" placeholder="Aadhar Number" class="form-control" name="aadhar_number" id="aadhar_number"
                                                             value="{{ old('aadhar_number',isset($data->aadhar_number) ? $data->aadhar_number : '' )}}">
                                                        </div>

                                                        <div class="mb-3 col-md-3">
                                                             <label for="inputPassword4" class="form-label">Aadhar Document</label>
                                                             <input type="file" placeholder="Aadhar Document" class="form-control" name="aadhar_document" id="aadhar_document"
                                                             value="{{ old('aadhar_document',isset($data->aadhar_document) ? $data->aadhar_document : '' )}}">
                                                        </div>

                                                        <div class="mb-3 col-md-3">
                                                             <label for="inputPassword4" class="form-label">Driver Photo</label>
                                                             <input type="file" placeholder="Driver Photo" class="form-control" name="driver_photo" id="driver_photo"
                                                             value="{{ old('driver_photo',isset($data->driver_photo) ? $data->driver_photo : '' )}}">
                                                        </div>

                                                        <div class="mb-3 col-md-3">
                                                             <label for="inputPassword4" class="form-label">Driving Licence Document</label>
                                                             <input type="file" placeholder="Driving Licence Document" class="form-control" name="driving_licence_document" id="driving_licence_document"
                                                             value="{{ old('driving_licence_document',isset($data->driving_licence_document) ? $data->driving_licence_document : '' )}}">
                                                        </div>

                                                        <div class="mb-3 col-md-3">
                                                             <label for="inputPassword4" class="form-label">Driving Licence Number</label>
                                                             <input type="text" placeholder="Driving Licence Document" class="form-control" name="driving_licence_number" id="driving_licence_number"
                                                             value="{{ old('driving_licence_number',isset($data->driving_licence_number) ? $data->driving_licence_number : '' )}}">
                                                        </div>

                                                        <div class="mb-3 col-md-3">
                                                             <label for="inputPassword4" class="form-label">Driving Licence Expiry</label>
                                                             <input type="text" class="form-control datepicker" name="driving_licence_expiry" id="driving_licence_expiry"
                                                             value="{{ old('driving_licence_expiry',isset($data->driving_licence_expiry) ? $data->driving_licence_expiry : '' )}}">
                                                        </div>

                                                        <div class="mb-3 col-md-3">
                                                             <label for="inputPassword4" class="form-label">Salary</label>
                                                             <input type="number" class="form-control"  placeholder="Salary" name="salary" id="salary"
                                                             value="{{ old('salary',isset($data->salary) ? $data->salary : '' )}}">
                                                        </div>

                                                        <div class="mb-3 col-md-3">
                                                             <label for="inputPassword4" class="form-label">Address</label>
                                                             <input type="text" class="form-control"  placeholder="Address" name="address" id="address"
                                                             value="{{ old('address',isset($data->address) ? $data->address : '' )}}">
                                                        </div>

                                                        <div class="mb-3 col-md-3">
                                                             <label for="inputPassword4" class="form-label">Date of Leaving</label>
                                                             <input type="text" class="form-control datepicker"  placeholder="Date of Leaving" name="date_of_leave" id="date_of_leave"
                                                             value="{{ old('date_of_leave',isset($data->date_of_leave) ? $data->date_of_leave : '' )}}">
                                                        </div>
                                                        <div class="col-md-3">
                                                             <label for="inputPassword4" class="form-label">Status</label>
                                                             <select  name="status" class="form-select js-example-basic-single">
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