<?php

namespace App\Http\Controllers;

use App\Models\Kinpin;
use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Driver;
use App\Models\Supplier;

class KinpinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Kinpin::all();
        return view('admin.kinpinView',compact('records'));
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
        return view('admin.kinpin',compact('vehicle','supp','driver'));
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
            'front_1'=>'max:100',
            'front_2'=>'max:100',
            'self_warranty'=>'max:100',
            'paymentType'=>'required|max:10',
            ]);
        $input['date'] = date('Y-m-d',strtotime($request->date));
        $input['created_by']=isset(auth()->user()->id) ? auth()->user()->id : 0;
        $input['comapany_id']=isset(auth()->user()->comapany_id) ? auth()->user()->comapany_id : 0;
        $res = Kinpin::create($input);
        return redirect()->back()->with('success','Kinpin added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kinpin  $kinpin
     * @return \Illuminate\Http\Response
     */
    public function show(Kinpin $kinpin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kinpin  $kinpin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehicle = Vehicle::where('status',0)->get();
        $driver = Driver::all();
        $supp = Supplier::all();
        $data = Kinpin::find($id);
        return view('admin.murgabusing',compact('vehicle','supp','driver','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kinpin  $kinpin
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
            'front_1'=>'max:100',
            'front_2'=>'max:100',
            'self_warranty'=>'max:100',
            'paymentType'=>'required|max:10',
            ]);
        $input['date'] = date('Y-m-d',strtotime($request->date));
        $res = Kinpin::where('id',$id)->update($input);
        $input['created_by']=isset(auth()->user()->id) ? auth()->user()->id : 0;
        $input['comapany_id']=isset(auth()->user()->comapany_id) ? auth()->user()->comapany_id : 0;
        return redirect()->back()->with('success','Kinpin updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kinpin  $kinpin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kinpin::where('id',$id)->detele();
        return redirect()->back()->with('success','Kinpin deleted successfully');
    }
}
