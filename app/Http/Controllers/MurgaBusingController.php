<?php

namespace App\Http\Controllers;

use App\Models\MurgaBusing;
use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Driver;
use App\Models\Supplier;

class MurgaBusingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = MurgaBusing::all();
        return view('admin.murgaBusingView',compact('records'));
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
        return view('admin.murgabusing',compact('vehicle','supp','driver'));
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
            'paymentType'=>'required|max:10',
            ]);
        $input['date'] = date('Y-m-d',strtotime($request->date));
        $input['created_by']=isset(auth()->user()->id) ? auth()->user()->id : 0;
        $input['comapany_id']=isset(auth()->user()->comapany_id) ? auth()->user()->comapany_id : 0;
        $res = MurgaBusing::create($input);
        return redirect()->back()->with('success','Murga Busing added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MurgaBusing  $murgaBusing
     * @return \Illuminate\Http\Response
     */
    public function show(MurgaBusing $murgaBusing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MurgaBusing  $murgaBusing
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehicle = Vehicle::where('status',0)->get();
        $driver = Driver::all();
        $supp = Supplier::all();
        $data = MurgaBusing::find($id);
        return view('admin.murgabusing',compact('vehicle','supp','driver','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MurgaBusing  $murgaBusing
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
            'staff'=>'required|max:100',
            'paymentType'=>'required|max:10',
            ]);
        $input['date'] = date('Y-m-d',strtotime($request->date));
        unset($input['_method']);
        unset($input['_token']);
        $input['created_by']=isset(auth()->user()->id) ? auth()->user()->id : 0;
        $input['comapany_id']=isset(auth()->user()->comapany_id) ? auth()->user()->comapany_id : 0;
        $res = MurgaBusing::where('id',$id)->update($input);

        return redirect(route('murgaBusing.index'))->with('success','Murga Busing Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MurgaBusing  $murgaBusing
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MurgaBusing::where('id',$id)->detele();
        return redirect()->back()->with('success','Murga Busing deleted successfully');
    }
}
