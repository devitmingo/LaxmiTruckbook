@php
use App\Http\Controllers\AdminController;
@endphp
@extends('layouts.app')
@section('body')
   <!-- Start Content-->
  <div class="container-fluid">

  <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Vehicle Number : {{ isset($records[0]->vechicle_number) ? $records[0]->vechicle_number : '' }}</h4>
                                    
                                </div>
                                </div>
                        </div>     
                        <!-- end page title --> 



                        <div class="row">
                            <x-alert/>
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- <a href="{{ route('tyre.create') }}"><button  type="button" class="btn btn-primary right"> + Add Tyre Entry</button></a>
                                        <br>
                                        </br> -->
                                        <ul class="nav nav-tabs nav-bordered mb-3">
                                            
                                        </ul> <!-- end nav-->
                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="buttons-table-preview">
                                                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                                    <thead>
                                                        <tr>
                                                            <th>SN</th>
                                                           
                                                            <th>Tyre type</th>
                                                            <th>Serial Number</th>
                                                            
                                                            <th>Tyre Company Name</th>
                                                            <th>Meter Reading</th>
                                                            <th>Date</th>

                                                            <th>Tyre Model</th>
                                                            <th>Image</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                
                                                
                                                   <tbody>
                                                        @foreach($records as $row)

                                                        @php 
                                                       $meter_reading= isset($row->meter_reading) ? $row->meter_reading : '0';
                                                        $end_meter_reading = isset($row->ending_meter_reading) ? $row->ending_meter_reading :'0';
                                                        $tota_run_meter = $end_meter_reading-$meter_reading;
                                                        @endphp
                                                        <tr>
                                                            <td>{{ $loop->index+1 }}</td>
                                                           
                                                            <td>{{ $row->tyre_type }}</td>
                                                            
                                                            <td>{{ isset($row->serial_number) ? $row->serial_number : '' }}</td>
                                                            <td>{{ isset($row->tyre_company_name) ? $row->tyre_company_name : '' }}</td>
                                                            
                                                            <td>{{ $meter_reading }} {{ isset($row->ending_meter_reading) ? "=>".$end_meter_reading : '' }} <span style="color:red;"> {{ isset($row->ending_meter_reading) ? "(".$tota_run_meter.")" : '' }}</span></td>
                                                            <td>{{ isset($row->upload_date) ? date('d-m-Y',strtotime($row->upload_date)) : '' }} {{ isset($row->remove_upload_date) ? "=>".date('d-m-Y',strtotime($row->remove_upload_date)) : '' }}</td>
                                                            <td>{{ isset($row->tyre_model) ? $row->tyre_model : '' }}</td>
                                                            <td><a href="{{ url('tyres/'.$row->new_tyre_image) }}" target="_blank">View Image</a></td>
                                                           

                                                             <td>
                                                                <a href="#" class="btn" rel="tooltip" title="Delete">
                                                                
                                                                <form action="{{route('tyre.destroy',$row->id)}}" method="post">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button type="submit" class="btn btn-danger">
                                                                    
                                                                    <i class="mdi mdi-window-close" onclick="return confirm('Are you sure to Delete?')"></i>
                                                                    </button>
                                                                </form>
                                                                </a>
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