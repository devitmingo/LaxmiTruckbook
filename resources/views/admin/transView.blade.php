@php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AddShortController;
@endphp
@extends('layouts.app')
@section('body')
   <!-- Start Content-->
  <div class="container-fluid">

  <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Transaction List</h4>
                                    
                                </div>
                                <div class="tab-content">
                                            <div class="tab-pane show active" id="form-row-preview">
                                               <form action="" method="get">
                                               
                                               @csrf
                                                    <div class="row g-2">
                                                      <div class="col-md-2">
                                                             <label for="inputPassword4" class="form-label">From Date</label>
                                                             <input type="text" name="from_date"  id="from_date" class="form-control datepicker" 
                                                            value="{{ isset($fromDate) ? date('d-m-Y',strtotime($fromDate)) : $date  }}">
                                                        </div>
                                                        
                                                       <div class="col-md-2">
                                                            <label for="inputPassword4" class="form-label">To Date</label>
                                                            <input type="text" name="to_date"  id="to_date" class="form-control datepicker" id="inputCity"
                                                             value="{{ isset($toDate) ? date('d-m-Y',strtotime($toDate)) : $date  }}">
                                                       </div>
                                                       
                                                        <div class="col-md-2" style="margin-top:42px;">
                                                           
                                                            <button type="submit" class="btn btn-success"><i class="mdi mdi-account-search"></i> Search</button>
                                                            <a href="{{ route('trans.index') }}" type="reset" class="btn btn-danger"><i class="mdi mdi-refresh"></i> Reset</a>
                                                        </div>
                                                 </div>
                                                  
                                                </form>                      
                                            </div> <!-- end preview-->
                                        
                                           
                                        </div> <!-- end tab-content-->
                                </div>
                        </div>     
                        <!-- end page title --> 



                        <div class="row">
                            <x-alert/>
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <a href="{{ route('trans.create') }}"><button  type="button" class="btn btn-primary right"> + Add Transaction</button></a>
                                        
                                        <a href="{{ route('trans.pdf') }}"><button  type="button" class="btn btn-warning right"> <i class="mdi mdi-file-pdf"></i> Transaction Report</button></a>
                                        <br>
                                        </br>
                                        <ul class="nav nav-tabs nav-bordered mb-3">
                                            
                                        </ul> <!-- end nav-->
                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="buttons-table-preview">
                                                <table  class="table table-striped dt-responsive nowrap w-100">
                                                    <thead>
                                                        <tr>
                                                            <th>SN</th>
                                                            <th>Transaction Type</th>
                                                            <th>Head/Vendor Name</th>
                                                            <th>Pay Type</th>
                                                            <th>Amount</th>
                                                            <th>Date</th>
                                                            <th>Notes</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                
                                                
                                                   <tbody>
                                                        @foreach($records as $row)
                                                        @php
                                                         $pay_type = AdminController::getValueStatic2('advance_types','name','id',$row->pay_type);
                                                         if($row->trans_type == 'Vendor'){
                                                            $head_type = AdminController::getValueStatic2('vendors','vendorName','id',$row->head_type);
                                                         }else{
                                                            $head_type = AdminController::getValueStatic2('heads','name','id',$row->head_type);
                                                         }
                                                        @endphp
                                                        <tr>
                                                            <td>{{ $loop->index+1 }}</td>
                                                            <td>{{ $row->trans_type }}</td>
                                                            <td>{{ $head_type }}</td>
                                                            <td>{{ $pay_type  }}</td>
                                                            <td>{{ $row->amount }}</td>
                                                            <td>{{ date('d-m-Y',strtotime($row->trans_date)) }}</td>
                                                            <td>{{ $row->notes }}</td>
                                                             <td>
                                                             <a href="{{route('trans.edit',$row->id)}}" class="btn btn-success" rel="tooltip" title="Edit">
                                                                    <i class="mdi mdi-square-edit-outline"></i>
                                                                </a>
                                                                <a href="#" class="btn" rel="tooltip" title="Delete">
                                                                
                                                                <form action="{{route('trans.destroy',$row->id)}}" method="post">
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