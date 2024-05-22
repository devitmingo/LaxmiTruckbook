@extends('layouts.app')
@section('body')
   <!-- Start Content-->
  <div class="container-fluid">

  <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Driver List</h4>
                                    
                                </div>
                                </div>
                        </div>     
                        <!-- end page title --> 



                        <div class="row">
                            <x-alert/>
                                <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <a href="{{ route('driver.create') }}"><button  type="button" class="btn btn-primary right"> + Add Driver</button></a>
                                        <br>
                                        </br>
                                        <ul class="nav nav-tabs nav-bordered mb-3">
                                            
                                        </ul> <!-- end nav-->
                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="buttons-table-preview">
                                                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                                    <thead>
                                                        <tr>
                                                            <th>SN</th>
                                                            <th>Driver Name</th>
                                                            <th>Mobile</th>
                                                           
                                                            <th>DOJ</th>
                                                            <th>Aadhar Number</th>
                                                            
                                                            <th>Driving Licence Number</th>
                                                            <th>Driving Licence Expiry</th>
                                                            <th>Salary</th>
                                                            <th>Address</th>
                                                            <th>Status</th>
                                                            <th>Document</th>
                                                            <th>Date of Leaving</th>
                                                            
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                
                                                
                                                   <tbody>
                                                        @foreach($records as $row)
                                                        <tr>
                                                            <td>{{ $loop->index+1 }}</td>
                                                            <td>{{ isset($row->driverName) ? $row->driverName : '' }}</td>
                                                            <td>{{ isset($row->mobile) ? $row->mobile : '' }}, {{ isset($row->mobile2) ? $row->mobile2 : '' }}</td>
                                                            
                                                            <td>{{ isset($row->date_of_joining) ? date('d-m-Y',strtotime($row->date_of_joining)) : '' }}</td>
                                                            <td>{{ isset($row->aadhar_number) ? $row->aadhar_number : '' }}</a></td>
                                                            
                                                            <td>{{ isset($row->driving_licence_number) ? $row->driving_licence_number : '' }}</td>
                                                            <td>{{ isset($row->driving_licence_expiry) ? date('d-m-Y',strtotime($row->driving_licence_expiry)) : '' }}</td>
                                                            <td>{{ isset($row->salary) ? $row->salary : '' }}</td>
                                                            <td>{{ isset($row->address) ? $row->address : '' }}</td>
                                                            <td>@if($row->status==1)  Enable @else Disable  @endif </td>
                                                            <td><a href="{{ url('driver/'.$row->aadhar_document) }}" target="_blank">{{ isset($row->aadhar_document) ? 'Aadhar Card ,' : '' }}
                                                            <a href="{{ url('driver/'.$row->driver_photo) }}" target="_blank">{{ isset($row->driver_photo) ? 'Driver Photo,' : '' }}
                                                            <a href="{{ url('driver/'.$row->driving_licence_document) }}" target="_blank">{{ isset($row->driving_licence_document) ? 'Driving Licence' : '' }}

                                                            </td>
                                                            <td>{{ isset($row->date_of_leave) ? date('d-m-Y',strtotime($row->date_of_leave)) : '' }}</td>
                                                            <td><a href="{{route('driver.edit',$row->id)}}" class="btn btn-success" rel="tooltip" title="Edit">
                                                                    <i class="mdi mdi-square-edit-outline"></i>
                                                                </a>
                                                                <!-- <a href="#" class="btn" rel="tooltip" title="Delete">
                                                                
                                                                <form action="{{route('driver.destroy',$row->id)}}" method="post">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button type="submit" class="btn btn-danger">
                                                                    
                                                                    <i class="mdi mdi-window-close" onclick="return confirm('Are you sure to Delete?')"></i>
                                                                    </button>
                                                                </form>
                                                                </a> -->
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>                                           
                                            </div> <!-- end preview-->
                                        
                                           
                                        </div> <!-- end tab-content-->
                                        
                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->
                        </div>
                        <!-- end row-->

  </div>                  
@endsection