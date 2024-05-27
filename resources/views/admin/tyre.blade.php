
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
                                                            <button type="button" onclick="onSubmit()" class="btn btn-primary">{{ "Get" }}</button>
                                                            </div>
                                                            <div class="mb-3 col-md-2">
                                                            </br>  
                                                            <form action="{{ route('tyre.index') }}" method="">
                                                                <input name="vehicle_no"  id="vehicle_no" type="hidden" />
                                                                <button  type="submit"  class="btn btn-primary"><span class="vehical_span"><span> {{ "Report" }}</button>
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


<!-- Modal -->
<div class="modal fade m-5" id="tyreEntry" tabindex="-1" role="dialog" aria-labelledby="tyreEntry" aria-hidden="true">
  <div class="modal-dialog" role="document" style="margin-left: 550px!important;">
    <div class="modal-content" style="width:150%;">
      <div class="modal-header">
        <h5 class="modal-title" id="tyreEntry">Vehical Number : <span class="vehical"></span> || Tyre Type: <span class="tyre_ty"></span></h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form id="TyreTypeSubmit" enctype="multipart/form-data" > 
             @csrf
                <div class="modal-body px-4 pb-4 pt-0">
                                                <div class="row">
                                                
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label class="control-label form-label">Serial Number</label>
                                                            <input class="form-control" placeholder="Serial Number" type="text" name="serial_number" id="serial_number" required />
                                                            <input type="hidden" name="vechicle_id" id="vechicle_id" required />
                                                            <input type="hidden" name="vechicle_number" id="vechicle_number" required /> 
                                                            <input type="hidden" name="tyre_type" id="tyre_type" required /> 
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label class="control-label form-label">Tyre Company Name</label>
                                                            <input class="form-control" placeholder="Tyre Company Name" type="text" name="tyre_company_name" id="tyre_company_name" required />
                                                            
                                                        </div>
                                                    </div>

                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label class="control-label form-label">Meter Reading</label>
                                                            <input class="form-control" placeholder="Meter Reading" type="text" name="meter_reading" id="meter_reading" required />
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label class="control-label form-label">Upload Date</label>
                                                            <input class="form-control datepicker" placeholder="Upload Date" type="text" name="upload_date" id="upload_date" required />
                                                            
                                                        </div>
                                                    </div>

                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label class="control-label form-label">Tyre Model</label>
                                                            <input class="form-control" placeholder="Tyre Model" type="text" name="tyre_model" id="tyre_model"  />
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label class="control-label form-label">Tyre New Image</label>
                                                            <input class="form-control" placeholder="Tyre New Image" type="file" name="new_tyre_image" id="new_tyre_image"  />
                                                            
                                                        </div>
                                                    </div>

                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label class="control-label form-label">Tyre Old Image</label>
                                                            <input class="form-control" placeholder="Tyre Old Image" type="file" name="old_tyre_image" id="old_tyre_image"  />
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label class="control-label form-label">Old Tyre Serial NO</label>
                                                            <input class="form-control" placeholder="Old Tyre Serial NO" type="text" name="old_tyre_serial_number" id="old_tyre_serial_number"  />
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label class="control-label form-label">Old Tyre Company Name</label>
                                                            <input class="form-control" placeholder="Old Tyre Serial NO" type="text" name="old_tyre_company_name" id="old_tyre_company_name"  />
                                                            
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                <div class="col-6 text-end"></div>
                                                    <div class="col-6 text-end">
                                                        <button type="button" class="btn btn-light me-1" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-success" id="btn-save-event">Save</button>
                                                    </div>
                                                </div>
                                            </div>
        </form>
    </div>
  </div>
</div>


<script>
    function onSubmit(){
        var id = $('#vehicleNumber').val();
        $.ajax({
            type:'GET',
            url:'{{ url("get-single-row-value") }}?table=vehicles&value='+id+'&key=id',
            success:function(response){
                $('.vehical').html(response.vehicleNumber)
                $('#vechicle_number').val(response.vehicleNumber);
                $('.vehical_span').html(response.vehicleNumber+" Report")
                $('#vechicle_id').val(response.id);
                $('#vehicle_no').val(response.id);
                $('#table'+response.vehicle_tyre).show();
             }
            });
    }
    function tireOpeningModal(value){
        $(".tyre_ty").html(value);
        $('#tyre_type').val(value);
        $("#tyreEntry").modal('show');  
    }
    $('#TyreTypeSubmit').on('submit', function(event){
        event.preventDefault();
        let formData = new FormData(this);
        $.ajax({
            type:'POST',
            url:'{{ Route("tyre.store") }}',
            enctype: 'multipart/form-data',
            data:  formData,
            contentType: false,
            processData: false,
            cache:false,
            success:function(response){
                alert(response);
                console.log(response);
                $("#tyreEntry").modal('hide');  
                $('#TyreTypeSubmit').trigger("reset");

            },

            error: function(response) {
            }
            });
    });
</script>
@endsection