<?php

namespace App\Http\Controllers;

use App\Models\Urearefilling;
use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Driver;
use App\Models\Vendor;
use Session;

class UrearefillingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $records = Urearefilling::get();
        if(isset($request->from_date) && isset($request->to_date))
        {
            $fromDate = date('Y-m-d', strtotime($request->from_date));
            $toDate = date('Y-m-d', strtotime($request->to_date));
            }else{
            $startDate = now()->subDays(30);
            $fromDate = date('Y-m-d', strtotime($startDate));
            $toDate = date('Y-m-d', strtotime(date('Y-m-d'))); 
        }
      
        $records = $records->WhereBetween('refilling_date',[$fromDate,$toDate]);
        if(isset($request->vehicleNumber)){
            $records = $records->where('vehicle_id',$request->vehicleNumber);
        }
        //return $records;
        return view('admin.ureaRefillingView',compact('records','fromDate','toDate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehicle = Vehicle::select('id','vehicleNumber')->where('ownership','My Truck')->get();
        $driver = Driver::orderBy('id','DESC')->get();
        $vendor = Vendor::orderBy('id','DESC')->get();
        return view('admin.ureaRilling',compact('vehicle','driver','vendor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input =  $request->all();
    
         $request->validate([
            'vehicle_id'=>'required',
            'driver_id'=>'required',
            'place'=>'required|max:255',
            'meter_reading'=>'required|max:255',
            'refilling_date'=>'date',
            'liter'=>'required|max:30',
            'amount'=>'sometimes|required',
            'paymentType'=>'required',
         ]
        );
        $company = Session::get('company');
        $session = Session::get('session');
        $input['comapany_id'] = isset($company) ? $company : '';
        $input['created_by'] = isset(auth()->user()->id) ? auth()->user()->id : 0;
        $input['session_id'] = isset($session) ? $session : '';
        $input['refilling_date'] = date('Y-m-d',strtotime($request->refilling_date));
        $input['amount'] = isset($request->amount) ? $request->amount : '';
        $input['paymentType'] = isset($request->paymentType) ? $request->paymentType : '';
        Urearefilling::create($input);
        return redirect(route('urea.index'))->with('success','Urea Refilling added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Urearefilling  $urearefilling
     * @return \Illuminate\Http\Response
     */
    public function show(Urearefilling $urearefilling)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Urearefilling  $urearefilling
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Urearefilling::find($id);
        $vehicle = Vehicle::select('id','vehicleNumber')->where('ownership','My Truck')->get();
        $driver = Driver::orderBy('id','DESC')->get();
        $vendor = Vendor::orderBy('id','DESC')->get();
        return view('admin.ureaRilling',compact('data','vehicle','driver','vendor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Urearefilling  $urearefilling
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input =  $request->all();
    
        $request->validate([
           'vehicle_id'=>'required',
           'driver_id'=>'required',
           'place'=>'required|max:255',
           'meter_reading'=>'required|max:255',
           'refilling_date'=>'date',
           'liter'=>'required|max:30',
           'amount'=>'required',
           'paymentType'=>'required',
        ]
       );
       $input['refilling_date'] = date('Y-m-d',strtotime($request->refilling_date));
       $input['created_by']=isset(auth()->user()->id) ? auth()->user()->id : 0;
       $input['comapany_id']=isset(auth()->user()->comapany_id) ? auth()->user()->comapany_id : 0;
       unset($input['_method']);
       unset($input['_token']);
       Urearefilling::where('id',$id)->update($input);
       return redirect(route('urea.index'))->with('success','Urea Refilling updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Urearefilling  $urearefilling
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Urearefilling::where('id',$id)->delete();
        return redirect()->back()->with('success','Urea Refilling Deleted successfully');
    }

  
}
