<?php

namespace App\Http\Controllers;

use App\Models\Patta;
use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Driver;
use App\Models\Supplier;

class PattaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Patta::all();
        return view('admin.pattaView',compact('records'));
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
        return view('admin.patta',compact('vehicle','supp','driver'));
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
            'pattaStatus'=>'required',
            'staff'=>'required|max:100',
            'paymentType'=>'required|max:10',
            ]);


        $fileName ='';
        if ($request->hasFile('photo')) {
            $rand_val = date('YMDHIS') . rand(11111, 99999);
            $image_file_name = md5($rand_val);
            $file = $request->file('photo');
            $fileName = $image_file_name . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path() . '/maintenance';
            $file->move($destinationPath, $fileName);
           
        }
        $input['photo'] = $fileName;
        $input['date'] = date('Y-m-d',strtotime($request->date));
        $input['created_by']=isset(auth()->user()->id) ? auth()->user()->id : 0;
        $input['comapany_id']=isset(auth()->user()->comapany_id) ? auth()->user()->comapany_id : 0;
        $res = Patta::create($input);
        return redirect()->back()->with('success','Patta added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patta  $patta
     * @return \Illuminate\Http\Response
     */
    public function show(Patta $patta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patta  $patta
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehicle = Vehicle::where('status',0)->get();
        $driver = Driver::all();
        $supp = Supplier::all();
        $data=Patta::find($id);
        return view('admin.patta',compact('vehicle','supp','driver','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patta  $patta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();

        $request->validate([
            'date'=>'date',
            'vehicleNumber'=>'required',
            'driverName'=>'required',
            'place'=>'required|max:150',
            'meterReading'=>'required|max:50',
            'pattaStatus'=>'required|max:10',
            'staff'=>'required|max:100',
            'paymentType'=>'required|max:10',
            ]);


        $fileName ='';
        if ($request->hasFile('photo')) {
            $rand_val = date('YMDHIS') . rand(11111, 99999);
            $image_file_name = md5($rand_val);
            $file = $request->file('photo');
            $fileName = $image_file_name . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path() . '/maintenance';
            $file->move($destinationPath, $fileName);
           
        }
        $input['photo'] = $fileName;
        $input['date'] = date('Y-m-d',strtotime($request->date));
        $input['created_by']=isset(auth()->user()->id) ? auth()->user()->id : 0;
        $input['comapany_id']=isset(auth()->user()->comapany_id) ? auth()->user()->comapany_id : 0;
        $res = Patta::where('id',$id)->update($input);
        return redirect()->back()->with('success','Patta updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patta  $patta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Patta::where('id',$id)->delete();
        return redirect()->back()->with('success','Patta deleted successfully');
    }
}
