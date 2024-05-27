@php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AddShortController;
use Carbon\Carbon;
$today = Carbon::now()->format('Y-m-d');
$from=Carbon::now()->addDays(30);

@endphp
@extends('layouts.app')
@section('body')
<!-- Start Content-->
<div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                  <h4 class="page-title">Dashboard</h4>
                                </div>
                            </div>
                        </div>     
                      <!-- end page title --> 

                      <div class="row">
                            
                          <div class="col-4">
                              <div class="card">
                                  <div class="card-body">
                                      <ul class="nav nav-tabs nav-bordered mb-3">
                                            <div class="col-12">
                                                <div class="page-title-box">
                                                <h4 class="page-title">Vehicle Insurance Expiry Date</h4>
                                                </div>
                                            </div>
                                      </ul> <!-- end nav-->
                                      <div class="tab-content">
                                          <div class="tab-pane show active" id="buttons-table-preview">
                                              <table  class="table table-striped dt-responsive nowrap w-100">
                                                  <thead>
                                                      <tr>
                                                          <th>SN</th>
                                                          <th>Vehicle Number</th>
                                                          <th>Date</th>
                                                          <th>Expiry Day</th>
                                                          </tr>
                                                  </thead>
                                              
                                              
                                                 <tbody>
                                                    @forelse($vehicles->whereBetween('insurance_expiry_date',[$today,$from]) as $row)
                                                    @php
                                                    $tdate = $row->insurance_expiry_date;
                                                    $datetime1 = new DateTime($today);
                                                    $datetime2 = new DateTime($tdate);
                                                    $interval = $datetime2->diff($datetime1);
                                                    $days = $interval->format('%a');
                                                      @endphp
                                                      <tr style="color:red;">
                                                          <td>{{ $loop->index+1 }}</td>
                                                          <td>{{ isset($row->vehicleNumber) ? $row->vehicleNumber : '' }}</td>
                                                          <td>{{ date('d-m-Y',strtotime($row->insurance_expiry_date))}}</td>
                                                          
                                                          <td>{{ $days }} Day</td>
                                                         
                                                      </tr>
                                                      @empty
                                                        <tr style="color:red;">
                                                            <th colspan="4">No Record Found</th>
                                                        </tr>
                                                      @endforelse
                                                  </tbody>
                                              </table>                                           
                                          </div> <!-- end preview-->
                                      
                                         
                                      </div> <!-- end tab-content-->
                                      
                                  </div> <!-- end card body-->
                              </div> <!-- end card -->
                          </div><!-- end col-->

                          <div class="col-4">
                              <div class="card">
                                  <div class="card-body">
                                      <ul class="nav nav-tabs nav-bordered mb-3">
                                            <div class="col-12">
                                                <div class="page-title-box">
                                                <h4 class="page-title"> Vehicle R C Expiry Date</h4>
                                                </div>
                                            </div>
                                      </ul> <!-- end nav-->
                                      <div class="tab-content">
                                          <div class="tab-pane show active" id="buttons-table-preview">
                                              <table  class="table table-striped dt-responsive nowrap w-100">
                                                  <thead>
                                                      <tr>
                                                          <th>SN</th>
                                                          <th>Vehicle Number</th>
                                                          <th>Date</th>
                                                          <th>Expiry Day</th>
                                                          </tr>
                                                  </thead>
                                              
                                              
                                                 <tbody>
                                                    @forelse($vehicles->whereBetween('r_c_expiry_date',[$today,$from]) as $row)
                                                    @php
                                                    $tdate = $row->r_c_expiry_date;
                                                    $datetime1 = new DateTime($today);
                                                    $datetime2 = new DateTime($tdate);
                                                    $interval = $datetime2->diff($datetime1);
                                                    $days = $interval->format('%a');
                                                      @endphp
                                                      <tr style="color:red;">
                                                          <td>{{ $loop->index+1 }}</td>
                                                          <td>{{ isset($row->vehicleNumber) ? $row->vehicleNumber : '' }}</td>
                                                          <td>{{ date('d-m-Y',strtotime($row->r_c_expiry_date))}}</td>
                                                          
                                                          <td>{{ $days }} Day</td>
                                                         
                                                      </tr>
                                                      @empty
                                                        <tr style="color:red;">
                                                            <th colspan="4">No Record Found</th>
                                                        </tr>
                                                      @endforelse
                                                  </tbody>
                                              </table>                                           
                                          </div> <!-- end preview-->
                                      
                                         
                                      </div> <!-- end tab-content-->
                                      
                                  </div> <!-- end card body-->
                              </div> <!-- end card -->
                          </div><!-- end col-->

                          <div class="col-4">
                              <div class="card">
                                  <div class="card-body">
                                      <ul class="nav nav-tabs nav-bordered mb-3">
                                            <div class="col-12">
                                                <div class="page-title-box">
                                                <h4 class="page-title"> Vehicle Fitness Expiry Date</h4>
                                                </div>
                                            </div>
                                      </ul> <!-- end nav-->
                                      <div class="tab-content">
                                          <div class="tab-pane show active" id="buttons-table-preview">
                                              <table  class="table table-striped dt-responsive nowrap w-100">
                                                  <thead>
                                                      <tr>
                                                          <th>SN</th>
                                                          <th>Vehicle Number</th>
                                                          <th>Date</th>
                                                          <th>Expiry Day</th>
                                                          </tr>
                                                  </thead>
                                              
                                              
                                                 <tbody>
                                                    @forelse($vehicles->whereBetween('fitness_expiry_date',[$today,$from]) as $row)
                                                    @php
                                                    $tdate = $row->fitness_expiry_date;
                                                    $datetime1 = new DateTime($today);
                                                    $datetime2 = new DateTime($tdate);
                                                    $interval = $datetime2->diff($datetime1);
                                                    $days = $interval->format('%a');
                                                      @endphp
                                                      <tr style="color:red;">
                                                          <td>{{ $loop->index+1 }}</td>
                                                          <td>{{ isset($row->vehicleNumber) ? $row->vehicleNumber : '' }}</td>
                                                          <td>{{ date('d-m-Y',strtotime($row->fitness_expiry_date))}}</td>
                                                          
                                                          <td>{{ $days }} Day</td>
                                                         
                                                      </tr>
                                                      @empty
                                                        <tr style="color:red;">
                                                            <th colspan="4">No Record Found</th>
                                                        </tr>
                                                      @endforelse
                                                  </tbody>
                                              </table>                                           
                                          </div> <!-- end preview-->
                                      
                                         
                                      </div> <!-- end tab-content-->
                                      
                                  </div> <!-- end card body-->
                              </div> <!-- end card -->
                          </div><!-- end col-->

                          <div class="col-4">
                              <div class="card">
                                  <div class="card-body">
                                      <ul class="nav nav-tabs nav-bordered mb-3">
                                            <div class="col-12">
                                                <div class="page-title-box">
                                                <h4 class="page-title"> Vehicle Tax Pay Expiry Date</h4>
                                                </div>
                                            </div>
                                      </ul> <!-- end nav-->
                                      <div class="tab-content">
                                          <div class="tab-pane show active" id="buttons-table-preview">
                                              <table  class="table table-striped dt-responsive nowrap w-100">
                                                  <thead>
                                                      <tr>
                                                          <th>SN</th>
                                                          <th>Vehicle Number</th>
                                                          <th>Date</th>
                                                          <th>Expiry Day</th>
                                                          </tr>
                                                  </thead>
                                              
                                              
                                                 <tbody>
                                                    @forelse($vehicles->whereBetween('tax_pay_expiry_date',[$today,$from]) as $row)
                                                    @php
                                                    $tdate = $row->tax_pay_expiry_date;
                                                    $datetime1 = new DateTime($today);
                                                    $datetime2 = new DateTime($tdate);
                                                    $interval = $datetime2->diff($datetime1);
                                                    $days = $interval->format('%a');
                                                      @endphp
                                                      <tr style="color:red;">
                                                          <td>{{ $loop->index+1 }}</td>
                                                          <td>{{ isset($row->vehicleNumber) ? $row->vehicleNumber : '' }}</td>
                                                          <td>{{ date('d-m-Y',strtotime($row->tax_pay_expiry_date))}}</td>
                                                          
                                                          <td>{{ $days }} Day</td>
                                                         
                                                      </tr>
                                                      @empty
                                                        <tr style="color:red;">
                                                            <th colspan="4">No Record Found</th>
                                                        </tr>
                                                      @endforelse
                                                  </tbody>
                                              </table>                                           
                                          </div> <!-- end preview-->
                                      
                                         
                                      </div> <!-- end tab-content-->
                                      
                                  </div> <!-- end card body-->
                              </div> <!-- end card -->
                          </div><!-- end col-->

                          <div class="col-4">
                              <div class="card">
                                  <div class="card-body">
                                      <ul class="nav nav-tabs nav-bordered mb-3">
                                            <div class="col-12">
                                                <div class="page-title-box">
                                                <h4 class="page-title"> Vehicle Permit Expiry Date</h4>
                                                </div>
                                            </div>
                                      </ul> <!-- end nav-->
                                      <div class="tab-content">
                                          <div class="tab-pane show active" id="buttons-table-preview">
                                              <table  class="table table-striped dt-responsive nowrap w-100">
                                                  <thead>
                                                      <tr>
                                                          <th>SN</th>
                                                          <th>Vehicle Number</th>
                                                          <th>Date</th>
                                                          <th>Expiry Day</th>
                                                          </tr>
                                                  </thead>
                                              
                                              
                                                 <tbody>
                                                    @forelse($vehicles->whereBetween('permit_expiry_date',[$today,$from]) as $row)
                                                    @php
                                                    $tdate = $row->permit_expiry_date;
                                                    $datetime1 = new DateTime($today);
                                                    $datetime2 = new DateTime($tdate);
                                                    $interval = $datetime2->diff($datetime1);
                                                    $days = $interval->format('%a');
                                                      @endphp
                                                      <tr style="color:red;">
                                                          <td>{{ $loop->index+1 }}</td>
                                                          <td>{{ isset($row->vehicleNumber) ? $row->vehicleNumber : '' }}</td>
                                                          <td>{{ date('d-m-Y',strtotime($row->permit_expiry_date))}}</td>
                                                          
                                                          <td>{{ $days }} Day</td>
                                                         
                                                      </tr>
                                                      @empty
                                                        <tr style="color:red;">
                                                            <th colspan="4">No Record Found</th>
                                                        </tr>
                                                      @endforelse
                                                  </tbody>
                                              </table>                                           
                                          </div> <!-- end preview-->
                                      
                                         
                                      </div> <!-- end tab-content-->
                                      
                                  </div> <!-- end card body-->
                              </div> <!-- end card -->
                          </div><!-- end col-->

                          <div class="col-4">
                              <div class="card">
                                  <div class="card-body">
                                      <ul class="nav nav-tabs nav-bordered mb-3">
                                            <div class="col-12">
                                                <div class="page-title-box">
                                                <h4 class="page-title"> Driver Licence Ex. Date</h4>
                                                </div>
                                            </div>
                                      </ul> <!-- end nav-->
                                      <div class="tab-content">
                                          <div class="tab-pane show active" id="buttons-table-preview">
                                              <table  class="table table-striped dt-responsive nowrap w-100">
                                                  <thead>
                                                      <tr>
                                                          <th>SN</th>
                                                          <th>Vehicle Number</th>
                                                          <th>Date</th>
                                                          <th>Expiry Day</th>
                                                          </tr>
                                                  </thead>
                                              
                                              
                                                 <tbody>
                                                    @forelse($drivers->whereBetween('driving_licence_expiry',[$today,$from]) as $row)
                                                    @php
                                                    $tdate = $row->driving_licence_expiry;
                                                    $datetime1 = new DateTime($today);
                                                    $datetime2 = new DateTime($tdate);
                                                    $interval = $datetime2->diff($datetime1);
                                                    $days = $interval->format('%a');
                                                      @endphp
                                                      <tr style="color:red;">
                                                          <td>{{ $loop->index+1 }}</td>
                                                          <td>{{ isset($row->driverName) ? $row->driverName : '' }}</td>
                                                          <td>{{ date('d-m-Y',strtotime($row->driving_licence_expiry))}}</td>
                                                          
                                                          <td>{{ $days }} Day</td>
                                                         
                                                      </tr>
                                                      @empty
                                                        <tr style="color:red;">
                                                            <th colspan="4">No Record Found</th>
                                                        </tr>
                                                      @endforelse
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