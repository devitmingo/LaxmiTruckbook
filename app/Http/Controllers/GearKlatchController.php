<?php

namespace App\Http\Controllers;

use App\Models\GearKlatch;
use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Driver;
use App\Models\Supplier;


class GearKlatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = GearKlatch::all();
        return view('admin.gearKlatchView',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehicle = Vehicle::where('status',0)->get();
        $driver = Driver::all();
        $supp = Supplier::all();
        return view('admin.gearKlatch',compact('vehicle','supp','driver'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $input = $request->all();

        $request->validate([
            'date'=>'date',
            'vehicleNumber'=>'required',
            'driverName'=>'required',
            'place'=>'required|max:150',
            'meterReading'=>'required|max:50',
            'shop_name'=>'max:150',
            'staff'=>'max:100',
            'clutchplate'=>'max:1',
            'clutchplate_company'=>'max:150',
            'fravil'=>'max:1',
            'fravil_company'=>'max:150',
            'prasor_plate'=>'max:1',
            'prasor_plate_company'=>'max:150',
            'release_bearing'=>'max:1',
            'release_bearing_company'=>'max:150',
            'self_warranty'=>'max:100',
            'mistri'=>'max:100',
            'paymentType'=>'required|max:10',
            ]);

        $input['date'] = date('Y-m-d',strtotime($request->date));
        $input['created_by']=isset(auth()->user()->id) ? auth()->user()->id : 0;
        $input['comapany_id']=isset(auth()->user()->comapany_id) ? auth()->user()->comapany_id : 0;
        $res = GearKlatch::create($input);
        return redirect()->back()->with('success','Gear Klatch added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GearKlatch  $gearKlatch
     * @return \Illuminate\Http\Response
     */
    public function show(GearKlatch $gearKlatch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GearKlatch  $gearKlatch
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehicle = Vehicle::where('status',0)->get();
        $driver = Driver::all();
        $supp = Supplier::all();
        $data=GearKlatch::find($id);
        return view('admin.gearKlatch',compact('vehicle','supp','driver','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GearKlatch  $gearKlatch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $input = $request->all();

        $request->validate([
            'date'=>'date',
            'vehicleNumber'=>'required',
            'driverName'=>'required',
            'place'=>'required|max:150',
            'meterReading'=>'required|max:50',
            'shop_name'=>'max:150',
            'staff'=>'max:100',
            'clutchplate'=>'max:1',
            'clutchplate_company'=>'max:150',
            'fravil'=>'max:1',
            'fravil_company'=>'max:150',
            'prasor_plate'=>'max:1',
            'prasor_plate_company'=>'max:150',
            'release_bearing'=>'max:1',
            'release_bearing_company'=>'max:150',
            'self_warranty'=>'max:100',
            'mistri'=>'max:100',
            'paymentType'=>'required|max:10',
            ]);

        $input['date'] = date('Y-m-d',strtotime($request->date));
        $input['created_by']=isset(auth()->user()->id) ? auth()->user()->id : 0;
        $input['comapany_id']=isset(auth()->user()->comapany_id) ? auth()->user()->comapany_id : 0;
        $res = GearKlatch::where('id',$id)->update($input);
        return redirect()->back()->with('success','Gear Klatch updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GearKlatch  $gearKlatch
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        GearKlatch::where('id',$id)->detele();
        return redirect()->back()->with('success','Gear Klatch deleted successfully');
    }
}
