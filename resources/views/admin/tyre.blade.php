
@extends('layouts.app')
@section('body')
   <!-- Start Content-->
  <div class="container-fluid">
  <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Tyre Entry</h4>  
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
                                              
                                                    <div class="row g-2">
                                                        <div class="mb-3 col-md-3">
                                                            <label for="inputPassword4" class="form-label">Truck Number</label>
                                                            <select id="vehicleNumber" class="form-select js-example-basic-single" name="vehicleNumber">
                                                                <option value="">-Select-</option>
                                                                @foreach($records as $row)
                                                                    <option value="{{ $row->id }}">{{ $row->vehicleNumber }}</option>
                                                                @endforeach
                                                            </select>
                                                            <script>document.getElementById("vehicleNumber").value = "{{ old('vehicleNumber',isset($_GET['vehicleNumber']) ? $_GET['vehicleNumber'] : '' )}}"; </script>
                                                        </div>
                                                         <div class="mb-3 col-md-1">
                                                         </br>   
                                                            <button type="button" onclick="onSubmit()" class="btn btn-primary">  <i class="mdi mdi-account-search"></i>{{ "Get" }}</button>
                                                            </div>
                                                            <div class="mb-3 col-md-2">
                                                            </br>  
                                                            <form action="{{ route('tyre.index') }}" method="">
                                                                <input name="vehicle_no"  id="vehicle_no" type="hidden" />
                                                                <button  type="submit"  class="btn btn-primary"><i class="mdi mdi-sort-variant"></i><span class="vehical_span"><span> {{ "Report" }}</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                                    
                                            </div> <!-- end preview-->
                                        
                                           
                                        </div> <!-- end tab-content-->

                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="form-row-preview">
                                                <center>

                                                <table id="table10" style="display: none;">
                                                    <thead>
                                                        <tr>
                                                            <td>
                                                                <h5 style="margin-left: 38px;padding-top: 37px;">Front Left</h5>
                                                            </td>
                                                            <td></td>
                                                            <td style="cursor: pointer;" onclick="tireOpeningModal('Front Left')">
                                                                <h1 style="z-index: 1;position: absolute; padding-top: 27px;margin-left: 10px;color: white;font-size: 18px;">1</h1>
                                                                <img src="{{asset('dashboard/ty.png')}}" alt="" style="height: 110px;">
                                                            </td>
                                                            <td rowspan="6"><img src="{{asset('dashboard/body.png')}}" alt="" style="margin-left: -2px;"></td>
                                                            <td style="cursor: pointer;" onclick="tireOpeningModal('Front Right')">
                                                                <h1 style="z-index: 1;position: absolute; padding-top: 27px;margin-left: 25px;color: white;font-size: 18px;">2</h1>
                                                                <img class="i1" src="{{asset('dashboard/ty.png')}}" alt="" style="height: 110px;margin-left: -4px;">
                                                            </td>
                                                            <td></td>
                                                            <td>
                                                                <h5 style="margin-left: 20px;padding-top: 37px;">Front Right</h5>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <h5 style="margin-left: 22px;padding-top: 37px;">Crown Left 1 <br> Crown Left 2</h5>
                                                            </td>
                                                            <td style="cursor: pointer;" onclick="tireOpeningModal('Crown Left 1')">
                                                                <h1 style="z-index: 1;position: absolute; padding-top: 27px;margin-left: 10px;color: white;font-size: 18px;">3</h1>
                                                                <img src="{{asset('dashboard/2t.png')}}" alt="" style="height: 110px;margin-right: -7px;">
                                                            </td>
                                                            <td style="cursor: pointer;" onclick="tireOpeningModal('Crown Left 2')">
                                                                <h1 style="z-index: 1;position: absolute; padding-top: 27px;margin-left: 10px;color: white;font-size: 18px;">4</h1>
                                                                <img src="{{asset('dashboard/ty.png')}}" alt="" style="height: 110px;">
                                                            </td>
                                                            <!-- <td>  <div class="rectangle"> </div> </td> -->
                                                            <td style="cursor: pointer;" onclick="tireOpeningModal('Crown Right 1')">
                                                                <h1 style="z-index: 1;position: absolute; padding-top: 27px;margin-left: 21px;color: white;font-size: 18px;">5</h1>
                                                                <img class="i1" src="{{asset('dashboard/ty.png')}}" alt="" style="height: 110px;margin-left: -4px;">
                                                            </td>
                                                            <td style="cursor: pointer;" onclick="tireOpeningModal('Crown Right 2')">
                                                                <h1 style="z-index: 1;position: absolute; padding-top: 27px;margin-left: 10px;color: white;font-size: 18px;">6</h1>
                                                                <img class="i1" src="{{asset('dashboard/2t.png')}}" alt="" style="height: 110px;margin-left: -4px;">
                                                            </td>
                                                            <td>
                                                                <h5 style="margin-left: 26px;padding-top: 37px;">Crown Right 1 <br> Crown Right 2</h5>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <h5 style="margin-left: 39px;padding-top: 37px;">Dumy  Left 1 <br> Dumy Left 2</h5>
                                                            </td>
                                                            <td style="cursor: pointer;" onclick="tireOpeningModal('Dumy  Left 1')">
                                                                <h1 style="z-index: 1;position: absolute; padding-top: 27px;margin-left: 10px;color: white;font-size: 18px;">7</h1>
                                                                <img src="{{asset('dashboard/2t.png')}}" alt="" style="height: 110px;margin-right: -7px;">
                                                            </td>
                                                            <td style="cursor: pointer;" onclick="tireOpeningModal('Dumy  Left 2')">
                                                                <h1 style="z-index: 1;position: absolute; padding-top: 27px;margin-left: 10px;color: white;font-size: 18px;">8</h1>
                                                                <img src="{{asset('dashboard/ty.png')}}" alt="" style="height: 110px;">
                                                            </td>
                                                            <!-- <td>  <div class="rectangle"> </div> </td> -->
                                                            <td style="cursor: pointer;" onclick="tireOpeningModal('Dumy Right 1')">
                                                                <h1 style="z-index: 1;position: absolute; padding-top: 27px;margin-left: 22px;color: white;font-size: 18px;">9</h1>
                                                                <img class="i1" src="{{asset('dashboard/ty.png')}}" alt="" style="height: 110px; margin-left: -4px;">
                                                            </td>
                                                            <td style="cursor: pointer;" onclick="tireOpeningModal('Dumy Right 2')">
                                                                <h1 style="z-index: 1;position: absolute; padding-top: 27px;margin-left: 8px;color: white;font-size: 18px;">10</h1>
                                                                <img class="i1" src="{{asset('dashboard/2t.png')}}" alt="" style="height: 110px;margin-left: -4px;">
                                                            </td>
                                                            <td>
                                                                <h5 style="margin-left: 26px;padding-top: 37px;">Dumy Right 1 <br>Dumy Right 2</h5>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td style="cursor: pointer;" onclick="tireOpeningModal('Stepney')"><img src="{{asset('dashboard/tyer.png')}}" alt="" style="height: 119px;margin-left: 141px;position: absolute;margin-top: -124px;"></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                    </thead>
                                                </table>


                                                <table id="table12" style="display: none;">
                                                    <thead>
                                                    <tr>
                                                        <td>
                                                            <h5 style="margin-left: 54px;padding-top: 37px;">Front Left</h5>
                                                        </td>
                                                        <td></td>
                                                        <td style="cursor: pointer;" onclick="tireOpeningModal('Front Left')">
                                                            <h1 style="z-index: 1;position: absolute; padding-top: 27px;margin-left: 10px;color: white;font-size: 18px;margin-top: 35px;"">1</h1>
                                                            <img src="{{asset('dashboard/ty.png')}}" alt="" style="height: 110px;margin-top: 35px;"">
                                                        </td>
                                                        <td rowspan="8"><img src="{{asset('dashboard/body.png')}}" alt="" style="margin-left: -2px;"></td>
                                                        <td style="cursor: pointer;" onclick="tireOpeningModal('Front Right')">
                                                            <h1 style="z-index: 1;position: absolute; padding-top: 27px;margin-left: 25px;color: white;font-size: 18px;margin-top: 35px;"">2</h1>
                                                            <img class="i1" src="{{asset('dashboard/ty.png')}}" alt="" style="height: 110px;margin-left: -4px;margin-top: 35px;"">
                                                        </td>
                                                        <td></td>
                                                        <td>
                                                            <h5 style="margin-right: 31px;padding-top: 37px;">Front Right</h5>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h5 style="margin-left: 54px;padding-top: 37px;">Lefter Left</h5>
                                                        </td>
                                                        <td></td>
                                                        <td style="cursor: pointer;" onclick="tireOpeningModal('Lefter Left')">
                                                            <h1 style="z-index: 1;position: absolute; padding-top: 27px;margin-left: 10px;color: white;font-size: 18px;">3</h1>
                                                            <img src="{{asset('dashboard/ty.png')}}" alt="" style="height: 110px;">
                                                        </td>
                                                        <td style="cursor: pointer;" onclick="tireOpeningModal('Lefter Right')">
                                                            <h1 style="z-index: 1;position: absolute; padding-top: 27px;margin-left: 21px;color: white;font-size: 18px;">4</h1>
                                                            <img class="i1" src="{{asset('dashboard/ty.png')}}" alt="" style="height: 110px;margin-left: -4px;">
                                                        </td>
                                                        <td></td>
                                                        <td>
                                                            <h5 style="margin-right: 31px;padding-top: 37px;">Lefter Right</h5>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h5 style="margin-left: 54px;padding-top: 37px;">Crown Left 1 <br>Crown Left 2</h5>
                                                        </td>
                                                        <td style="cursor: pointer;" onclick="tireOpeningModal('Crown Left 1')">
                                                            <h1 style="z-index: 1;position: absolute; padding-top: 27px;margin-left: 10px;color: white;font-size: 18px;">5</h1>
                                                            <img src="{{asset('dashboard/2t.png')}}" alt="" style="height: 110px;margin-right: -7px;">
                                                        </td>
                                                        <td style="cursor: pointer;" onclick="tireOpeningModal('Crown Left 2')">
                                                            <h1 style="z-index: 1;position: absolute; padding-top: 27px;margin-left: 10px;color: white;font-size: 18px;">6</h1>
                                                            <img src="{{asset('dashboard/ty.png')}}" alt="" style="height: 110px;">
                                                        </td>
                                                        <!-- <td>  <div class="rectangle"> </div> </td> -->
                                                        <td style="cursor: pointer;" onclick="tireOpeningModal('Crown Right 1')">
                                                            <h1 style="z-index: 1;position: absolute; padding-top: 27px;margin-left: 21px;color: white;font-size: 18px;">7</h1>
                                                            <img class="i1" src="{{asset('dashboard/ty.png')}}" alt="" style="height: 110px;margin-left: -4px;">
                                                        </td>
                                                        <td style="cursor: pointer;" onclick="tireOpeningModal('Crown Right 2')">
                                                            <h1 style="z-index: 1;position: absolute; padding-top: 27px;margin-left: 10px;color: white;font-size: 18px;">8</h1>
                                                            <img class="i1" src="{{asset('dashboard/2t.png')}}" alt="" style="height: 110px;margin-left: -4px;">
                                                        </td>
                                                        <td>
                                                            <h5 style="margin-right: 31px;padding-top: 37px;">Crown Right 1 <br>Crown Right 2</h5>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h5 style="margin-left: 54px;padding-top: 37px;">Dumy Left 1 <br> Dumy Left 2</h5>
                                                        </td>
                                                        <td style="cursor: pointer;" onclick="tireOpeningModal('Dumy Left 1')">
                                                            <h1 style="z-index: 1;position: absolute; padding-top: 27px;margin-left: 10px;color: white;font-size: 18px;">9</h1>
                                                            <img src="{{asset('dashboard/2t.png')}}" alt="" style="height: 110px;margin-right: -7px;">
                                                        </td>
                                                        <td style="cursor: pointer;" onclick="tireOpeningModal('Dumy Left 2')">
                                                            <h1 style="z-index: 1;position: absolute; padding-top: 27px;margin-left: 10px;color: white;font-size: 18px;">10</h1>
                                                            <img src="{{asset('dashboard/ty.png')}}" alt="" style="height: 110px;">
                                                        </td>
                                                        <!-- <td>  <div class="rectangle"> </div> </td> -->
                                                        <td style="cursor: pointer;" onclick="tireOpeningModal('Dumy Right 1')">
                                                            <h1 style="z-index: 1;position: absolute; padding-top: 27px;margin-left: 22px;color: white;font-size: 18px;">11</h1>
                                                            <img class="i1" src="{{asset('dashboard/ty.png')}}" alt="" style="height: 110px; margin-left: -4px;">
                                                        </td>
                                                        <td style="cursor: pointer;" onclick="tireOpeningModal('Dumy Right 2')">
                                                            <h1 style="z-index: 1;position: absolute; padding-top: 27px;margin-left: 8px;color: white;font-size: 18px;">12</h1>
                                                            <img class="i1" src="{{asset('dashboard/2t.png')}}" alt="" style="height: 110px;margin-left: -4px;">
                                                        </td>
                                                        <td>
                                                            <h5 style="margin-right: 31px;padding-top: 37px;">Dumy Right 1 <br> Dumy Left 2</h5>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td style="cursor: pointer;" onclick="tireOpeningModal('Stepney')"><img src="{{asset('dashboard/tyer.png')}}" alt="" style="height: 116px;margin-left: 143px;position: absolute;margin-top: -125px;"></td>
                                                        <td></td>
                                                    </tr>
                                                    </thead>
                                                </table>


                                                    <table id="table14" style="display: none;">
                                                        <thead>
                                                        <tr>
                                                            <td>
                                                                <h5 style="margin-left: 54px;padding-top: 100px;">Front Left</h5>
                                                            </td>
                                                            <td></td>
                                                            <td style="cursor: pointer;" onclick="tireOpeningModal('Front Left')">
                                                                <h1 style="z-index: 1;position: absolute; padding-top: 27px;margin-left: 10px;color: white;font-size: 18px;margin-top: 58px;"">1</h1>
                                                                <img src="{{asset('dashboard/ty.png')}}" alt="" style="height: 78px;margin-top: 58px;"">
                                                            </td>
                                                            <td rowspan="8"><img src="{{asset('dashboard/body.png')}}" alt="" style="margin-left: -2px;"></td>
                                                            <td style="cursor: pointer;" onclick="tireOpeningModal('Front Right')">
                                                                <h1 style="z-index: 1;position: absolute; padding-top: 27px;margin-left: 15px;color: white;font-size: 18px;margin-top: 58px;"">2</h1>
                                                                <img class="i1" src="{{asset('dashboard/ty.png')}}" alt="" style="height: 78px;margin-left: -4px;margin-top: 58px;"">
                                                            </td>
                                                            <td></td>
                                                            <td>
                                                                <h5 style="margin-right: 31px;padding-top: 100px;">Front Right</h5>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <h5 style="margin-left: 54px;">Front Single Left</h5>
                                                            </td>
                                                            <td></td>
                                                            <td style="cursor: pointer;" onclick="tireOpeningModal('Front Single Left')">
                                                                <h1 style="z-index: 1;position: absolute; padding-top: 5px;margin-left: 10px;color: white;font-size: 18px;">3</h1>
                                                                <img src="{{asset('dashboard/ty.png')}}" alt="" style="height: 78px;">
                                                            </td>
                                                            <!-- <td>  <div class="rectangle"> </div> </td> -->
                                                            <td style="cursor: pointer;" onclick="tireOpeningModal('Front Single Right')">
                                                                <h1 style="z-index: 1;position: absolute; padding-top: 5px;margin-left: 15px;color: white;font-size: 18px;">4</h1>
                                                                <img class="i1" src="{{asset('dashboard/ty.png')}}" alt="" style="height: 78px;margin-left: -4px;">
                                                            </td>
                                                            <td></td>
                                                            <td>
                                                                <h5 style="margin-right: 31px;">Front Single Right</h5>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <h5 style="margin-left: 54px;">Lefter Left</h5>
                                                            </td>
                                                            <td></td>
                                                            <td style="cursor: pointer;" onclick="tireOpeningModal('Lefter Left')">
                                                                <h1 style="z-index: 1;position: absolute; padding-top: 5px;margin-left: 10px;color: white;font-size: 18px;">5</h1>
                                                                <img src="{{asset('dashboard/ty.png')}}" alt="" style="height: 78px;">
                                                            </td>
                                                            <!-- <td>  <div class="rectangle"> </div> </td> -->
                                                            <td style="cursor: pointer;" onclick="tireOpeningModal('Lefter Right')">
                                                                <h1 style="z-index: 1;position: absolute; padding-top: 5px;margin-left: 15px;color: white;font-size: 18px;">6</h1>
                                                                <img class="i1" src="{{asset('dashboard/ty.png')}}" alt="" style="height: 78px;margin-left: -4px;">
                                                            </td>
                                                            <td></td>
                                                            <td>
                                                                <h5 style="margin-right: 31px;">Lefter Right</h5>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <h5 style="margin-left: 54px;">Crown Left 1 <br>Crown Left 2</h5>
                                                            </td>
                                                            <td style="cursor: pointer;" onclick="tireOpeningModal('Crown Left 1')">
                                                                <h1 style="z-index: 1;position: absolute; padding-top: 5px;margin-left: 8px;color: white;font-size: 18px;">7</h1>
                                                                <img src="{{asset('dashboard/2t.png')}}" alt="" style="height: 78px;margin-right: -7px;">
                                                            </td>
                                                            <td style="cursor: pointer;" onclick="tireOpeningModal('Crown Left 2')">
                                                                <h1 style="z-index: 1;position: absolute; padding-top: 5px;margin-left: 8px;color: white;font-size: 18px;">8</h1>
                                                                <img src="{{asset('dashboard/ty.png')}}" alt="" style="height: 78px;">
                                                            </td>
                                                            <!-- <td>  <div class="rectangle"> </div> </td> -->
                                                            <td style="cursor: pointer;" onclick="tireOpeningModal('Crown Right 1')">
                                                                <h1 style="z-index: 1;position: absolute; padding-top: 5px;margin-left: 15px;color: white;font-size: 18px;">9</h1>
                                                                <img class="i1" src="{{asset('dashboard/ty.png')}}" alt="" style="height: 78px;margin-left: -4px;">
                                                            </td>
                                                            <td style="cursor: pointer;" onclick="tireOpeningModal('Crown Right 2')">
                                                                <h1 style="z-index: 1;position: absolute; padding-top: 5px;margin-left: 1px;color: white;font-size: 18px;">10</h1>
                                                                <img class="i1" src="{{asset('dashboard/2t.png')}}" alt="" style="height: 78px;margin-left: -4px;">
                                                            </td>
                                                            <td>
                                                                <h5 style="margin-right: 31px;margin-left: 20px;">Crown Right 1 <br>Crown Right 2</h5>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <h5 style="margin-left: 54px;">Dumy Left 1 <br>Dumy Left 2</h5>
                                                            </td>
                                                            <td style="cursor: pointer;" onclick="tireOpeningModal('Dumy Left 1')">
                                                                <h1 style="z-index: 1;position: absolute; padding-top: 5px;margin-left: 5px;color: white;font-size: 18px;">11</h1>
                                                                <img src="{{asset('dashboard/2t.png')}}" alt="" style="height: 78px;margin-right: -7px;">
                                                            </td>
                                                            <td style="cursor: pointer;" onclick="tireOpeningModal('Dumy Left 2')">
                                                                <h1 style="z-index: 1;position: absolute; padding-top: 5px;margin-left: 5px;color: white;font-size: 18px;">12</h1>
                                                                <img src="{{asset('dashboard/ty.png')}}" alt="" style="height: 78px;">
                                                            </td>
                                                            <!-- <td>  <div class="rectangle"> </div> </td> -->
                                                            <td style="cursor: pointer;" onclick="tireOpeningModal('Dumy Right 1')">
                                                                <h1 style="z-index: 1;position: absolute; padding-top: 5px;margin-left: 11px;color: white;font-size: 18px;">13</h1>
                                                                <img class="i1" src="{{asset('dashboard/ty.png')}}" alt="" style="height: 78px; margin-left: -4px;">
                                                            </td>
                                                            <td style="cursor: pointer;" onclick="tireOpeningModal('Dumy Right 2')">
                                                                <h1 style="z-index: 1;position: absolute; padding-top: 5px;margin-left: 1px;color: white;font-size: 18px;">14</h1>
                                                                <img class="i1" src="{{asset('dashboard/2t.png')}}" alt="" style="height: 78px;margin-left: -4px;">
                                                            </td>
                                                            <td>
                                                                <h5 style="margin-right: 31px; margin-left: 20px;">Dumy Right 1 <br> Dumy Right 2</h5>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td style="cursor: pointer;" onclick="tireOpeningModal('Stepney')"><img src="{{asset('dashboard/tyer.png')}}" alt="" style="height: 116px;margin-left: 127px;position: absolute;margin-top: -129px;"></td>
                                                            <td></td>
                                                        </tr>
                                                        </thead>
                                                    </table>

                                                    <table id="table16" style="display: none;">
                                                        <thead>
                                                                <tr>
                                                                    <td>
                                                                        <h5 style="margin-right: 31px;padding-top: 100px;">Front Left</h5>
                                                                    </td>
                                                                    <td></td>
                                                                    <td style="cursor: pointer;" onclick="tireOpeningModal('Front Left')">
                                                                        <h1 style="z-index: 1;position: absolute; padding-top: 89px;margin-left: 10px;color: white;font-size: 18px;">1</h1>
                                                                        <img src="{{asset('dashboard/ty.png')}}" alt="" style="height: 78px;margin-top: 81px;">
                                                                    </td>
                                                                    <td rowspan="10"><img src="{{asset('dashboard/body.png') }}" alt="" style="margin-left: -2px;"></td>
                                                                    <td style="cursor: pointer;" onclick="tireOpeningModal('Front Right')">
                                                                        <h1 style="z-index: 1;position: absolute; padding-top: 89px;margin-left: 15px;color: white;font-size: 18px;">2</h1>
                                                                        <img class="i1" src="{{asset('dashboard/ty.png')}}" alt="" style="transform: rotate(180deg);height: 78px;margin-left: -4px; margin-top: 81px;">
                                                                    </td>
                                                                    <td></td>
                                                                    <td>
                                                                        <h5 style="margin-right: 31px;padding-top: 100px;">Front Right</h5>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <h5>Front Single Left</h5>
                                                                    </td>
                                                                    <td></td>
                                                                    <td style="cursor: pointer;" onclick="tireOpeningModal('Front Single Left')">
                                                                        <h1 style="z-index: 1;position: absolute; padding-top: 5px;margin-left: 10px;color: white;font-size: 18px;">3</h1>
                                                                        <img src="{{asset('dashboard/ty.png')}}" alt="" style="height: 78px;">
                                                                    </td>
                                                                    <!-- <td>  <div class="rectangle"> </div> </td> -->
                                                                    <td style="cursor: pointer;" onclick="tireOpeningModal('Front Single Right')">
                                                                        <h1 style="z-index: 1;position: absolute; padding-top: 5px;margin-left: 15px;color: white;font-size: 18px;">4</h1>
                                                                        <img class="i1" src="{{asset('dashboard/ty.png')}}" alt="" style="transform: rotate(180deg);height: 78px;margin-left: -4px;">
                                                                    </td>
                                                                    <td></td>
                                                                    <td>
                                                                        <h5>Front Single Right</h5>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <h5>Lefter Left 1 <br>Lefter Left 2</h5>
                                                                    </td>
                                                                    <td style="cursor: pointer;" onclick="tireOpeningModal('Lefter Left 1')">
                                                                        <h1 style="z-index: 1;position: absolute; padding-top: 5px;margin-left: 8px;color: white;font-size: 18px;">5</h1>
                                                                        <img src="{{asset('dashboard/2t.png')}}" alt="" style="height: 78px;margin-right: -7px;">
                                                                    </td>
                                                                    <td style="cursor: pointer;" onclick="tireOpeningModal('Lefter Left 2')">
                                                                        <h1 style="z-index: 1;position: absolute; padding-top: 5px;margin-left: 8px;color: white;font-size: 18px;">6</h1>
                                                                        <img src="{{asset('dashboard/ty.png')}}" alt="" style="height: 78px;">
                                                                    </td>
                                                                    <!-- <td>  <div class="rectangle"> </div> </td> -->
                                                                    <td style="cursor: pointer;" onclick="tireOpeningModal('Lefter Right 1')">
                                                                        <h1 style="z-index: 1;position: absolute; padding-top: 5px;margin-left: 15px;color: white;font-size: 18px;">7</h1>
                                                                        <img class="i1" src="{{asset('dashboard/ty.png')}}" alt="" style="transform: rotate(180deg);height: 78px;margin-left: -4px;">
                                                                    </td>
                                                                    <td style="cursor: pointer;" onclick="tireOpeningModal('Lefter Right 2')">
                                                                        <h1 style="z-index: 1;position: absolute; padding-top: 5px;margin-left: 1px;color: white;font-size: 18px;">8</h1>
                                                                        <img class="i1" src="{{asset('dashboard/2t.png')}}" alt="" style="height: 78px;margin-left: -4px;">
                                                                    </td>
                                                                    <td>
                                                                        <h5 style="margin-left: 16px;">Lefter Right 1 <br>Lefter Right 2</h5>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <h5>Crown Left 1 <br> Crown Left 2</h5>
                                                                    </td>
                                                                    <td style="cursor: pointer;" onclick="tireOpeningModal('Crown Left 1')">
                                                                        <h1 style="z-index: 1;position: absolute; padding-top: 5px;margin-left: 5px;color: white;font-size: 18px;">9</h1>
                                                                        <img src="{{asset('dashboard/2t.png')}}" alt="" style="height: 78px;margin-right: -7px;">
                                                                    </td>
                                                                    <td style="cursor: pointer;" onclick="tireOpeningModal('Crown Left 2')">
                                                                        <h1 style="z-index: 1;position: absolute; padding-top: 5px;margin-left: 5px;color: white;font-size: 18px;">10</h1>
                                                                        <img src="{{asset('dashboard/ty.png')}}" alt="" style="height: 78px;">
                                                                    </td>
                                                                    <!-- <td>  <div class="rectangle"> </div> </td> -->
                                                                    <td style="cursor: pointer;" onclick="tireOpeningModal('Crown Right 1')">
                                                                        <h1 style="z-index: 1;position: absolute; padding-top: 5px;margin-left: 12px;color: white;font-size: 18px;">11</h1>
                                                                        <img class="i1" src="{{asset('dashboard/ty.png')}}" alt="" style="transform: rotate(180deg);height: 78px;margin-left: -4px;">
                                                                    </td>
                                                                    <td style="cursor: pointer;" onclick="tireOpeningModal('Crown Right 2')">
                                                                        <h1 style="z-index: 1;position: absolute; padding-top: 5px;margin-left: 1px;color: white;font-size: 18px;">12</h1>
                                                                        <img class="i1" src="{{asset('dashboard/2t.png')}}" alt="" style="height: 78px;margin-left: -4px;">
                                                                    </td>
                                                                    <td>
                                                                        <h5 style="margin-left: 16px;">Crown Right 1 <br> Crown Right 2</h5>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <h5>Dumy Left 1 <br>Dumy Left 2</h5>
                                                                    </td>
                                                                    <td style="cursor: pointer;" onclick="tireOpeningModal('Dumy Left 1')">
                                                                        <h1 style="z-index: 1;position: absolute; padding-top: 5px;margin-left: 3px;color: white;font-size: 18px;">13</h1>
                                                                        <img src="{{asset('dashboard/2t.png')}}" alt="" style="height: 78px;margin-right: -7px;">
                                                                    </td>
                                                                    <td style="cursor: pointer;" onclick="tireOpeningModal('Dumy Left 2')">
                                                                        <h1 style="z-index: 1;position: absolute; padding-top: 5px;margin-left: 5px;color: white;font-size: 18px;">14</h1>
                                                                        <img src="{{asset('dashboard/ty.png')}}" alt="" style="height: 78px;">
                                                                    </td>
                                                                    <!-- <td>  <div class="rectangle"> </div> </td> -->
                                                                    <td style="cursor: pointer;" onclick="tireOpeningModal('Dumy Right 1')">
                                                                        <h1 style="z-index: 1;position: absolute; padding-top: 5px;margin-left: 8px;color: white;font-size: 18px;">15</h1>
                                                                        <img class="i1" src="{{asset('dashboard/ty.png')}}" alt="" style="transform: rotate(180deg);height: 78px; margin-left: -4px;">
                                                                    </td>
                                                                    <td style="cursor: pointer;" onclick="tireOpeningModal('Dumy Right 2')">
                                                                        <h1 style="z-index: 1;position: absolute; padding-top: 5px;margin-left: 1px;color: white;font-size: 18px;">16</h1>
                                                                        <img class="i1" src="{{asset('dashboard/2t.png')}}" alt="" style="height: 78px;margin-left: -4px;">
                                                                    </td>
                                                                    <td>
                                                                        <h5 style="margin-left: 16px;">Dumy Right 1 <br>Dumy Right 2</h5>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td><img onclick="tireOpeningModal('Stepney')" src="{{asset('dashboard/tyer.png')}}" alt="" style="height: 119px;margin-left: 88px;position: absolute;margin-top: -129px;cursor: pointer;"></td>
                                                                    <td></td>
                                                                </tr>
                                                        </thead>
                                                    </table> 
                                                </center>                   
                                            </div> <!-- end preview-->
                                        
                                           
                                        </div> <!-- end tab-content-->

                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        

                        

</div> 


@include('admin.tyreModel')

@endsection