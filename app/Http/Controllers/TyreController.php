<?php

namespace App\Http\Controllers;

use App\Models\Tyre;
use Illuminate\Http\Request;
use App\Models\Vehicle;

class TyreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $records = Tyre::where('vechicle_id',$request->vehicle_no)->get();
        return view('admin.tyreView',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $records = Vehicle::select('id','vehicleNumber')->where('ownership','My Truck')->get();
        return view('admin.tyre',compact('records'));
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
        $fileName ='';
        if ($request->hasFile('new_tyre_image')) {
            $rand_val = date('YMDHIS') . rand(11111, 99999);
            $image_file_name = md5($rand_val);
            $file = $request->file('new_tyre_image');
            $fileName = $image_file_name . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path() . '/tyres';
            $file->move($destinationPath, $fileName);
           
        }

        $fileName1 ='';
        if ($request->hasFile('old_tyre_image')) {
            $rand_val = date('YMDHIS') . rand(11111, 99999);
            $image_file_name = md5($rand_val);
            $file = $request->file('old_tyre_image');
            $fileName1 = $image_file_name . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path() . '/tyres';
            $file->move($destinationPath, $fileName1);
           
        }

        $input['new_tyre_image']=$fileName;
        $input['old_tyre_image']=$fileName1;
        $input['status']=0;
        $input['upload_date'] = date('Y-m-d',strtotime($request->upload_date));
        $input['comapany_id'] = isset($company) ? $company : '0';
        $input['created_by'] = isset(auth()->user()->id) ? auth()->user()->id : 0;
        $input['session_id'] = isset($session) ? $session : '0';


        $tyre = Tyre::create($input);
        
        $old_tyre = Tyre::where('serial_number',$request->old_tyre_serial_number)->first();
        if($old_tyre){
            $old_tyre->ending_meter_reading=$request->meter_reading;
            $old_tyre->remove_upload_date=date('Y-m-d',strtotime($request->upload_date));
            $old_tyre->save();
        }
        if($tyre){
            return "Added Tyre Entry Successfully.";
        }else{
            return "Something Wrong.Please Try Again.";
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tyre  $tyre
     * @return \Illuminate\Http\Response
     */
    public function show(Tyre $tyre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tyre  $tyre
     * @return \Illuminate\Http\Response
     */
    public function edit(Tyre $tyre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tyre  $tyre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tyre $tyre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tyre  $tyre
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Tyre::where('id',$id)->delete();
        return redirect()->back()->with('success','Tyre Entry Deleted successfully');
    }
}
